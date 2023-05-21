<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;
use App\Models\UserModel;

class Register extends BaseController {

    public function index(){
        echo view('template/header');
        echo view('register');
        echo view('template/footer');
    }

    private function sendPostRequest($url, $postData)
    {
        $curl = \Config\Services::curlrequest();
        return $curl->setBody(http_build_query($postData))
            ->post($url)
            ->getBody();
    }

    public function save() {
        // Check captcha 
        $session = session();
        
        $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
        $secretKey = '6LeGXR0mAAAAADxI3ITPpuHcOsG5z_GoQ-Audlmi'; // Replace with your reCAPTCHA secret key
        
        $verificationUrl = 'https://www.google.com/recaptcha/api/siteverify';
        $postData = [
            'secret' => $secretKey,
            'response' => $recaptchaResponse,
            'remoteip' => $this->request->getIPAddress()
        ];
        
        $verificationResult = $this->sendPostRequest($verificationUrl, $postData);
        $verificationData = json_decode($verificationResult);
        
        if (!$verificationData->success) {
            return redirect()->to(base_url('signup'))->with('error', 'reCAPTCHA verification failed.');
        };

        $rules = [
            'firstName'=>'required|max_length[25]',
            'lastName'=>'required|max_length[25]',
            'email'=>'required|max_length[50]|valid_email|is_unique[users.email]',
            'password'=>'required|min_length[8]|max_length[100]',
            'cPassword'=>'matches[password]'
        ];

        if ($this->validate($rules)){
            $model = new UserModel();

            $first_name = $this->request->getPost('firstName');
            $last_name = $this->request->getPost('lastName');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            // Password encryption to be stored in database
            $db_password = password_hash($password, PASSWORD_BCRYPT);
            // Generate token for account activation
            $token = $model->generateToken();
            
            $data = [
                'firstName'=>$first_name,
                'lastName'=>$last_name,
                'email'=>$email,
                'password'=>$db_password,
                'token'=>$token,
                'activate'=>0
            ]; 

            // Send activation link by email 
            $checkEmail = new Email();
            $emailConf = [
                'protocol' => 'smtp',
                'wordWrap' => true,
                'SMTPHost' => 'mailhub.eait.uq.edu.au',
                'SMTPPort' => 25
            ];
            $checkEmail->initialize($emailConf);
            $checkEmail->setTo($email);
            $checkEmail->setFrom('celine.ma@uq.net.au');
            $checkEmail->setSubject('Welcome to UQ alumni ! Activate your account');
            $checkEmail->setMessage('Please click the following link to activate your account: ' . base_url() . 'user/activate/' . $token);
            $checkEmail->send();

            $model->addUser($data);
            $data['messageTitle'] = "Successfully registered!";
            $data['message'] = 'Thank you for joining us! <br> <br> We just sent you a link to check your email. Please activate your account by clicking on the link.';
            echo view('template/header');
            echo view('template/message', $data);
            echo view('template/footer');

        } else {
            $data['validation'] = $this->validator;
            echo view('template/header');
            echo view('register', $data);
            echo view('template/footer');
        };
    }

    public function activate_account($token)
    {
        $user = new UserModel();
        $activation = $user->activateUser($token);
        // echo $activation->id;
        if ($activation) {
            $data['messageTitle'] = 'Account activated!';
            $data['message'] = "Your account has been activated! Please log in.";
            echo view('template/header');
            echo view('template/message', $data);
            echo view('template/footer');
        } else {
           $data['messageTitle'] = 'Link unavailable';
            $data['message'] = "Something went wrong with this link. Please check your email box again. ";
            echo view('template/header');
            echo view('template/message', $data);
            echo view('template/footer'); 
        }
    }
}