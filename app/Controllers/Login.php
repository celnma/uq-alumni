<?php 

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;
use App\Models\UserModel;

class Login extends BaseController {

    public function index() {
        $data['error']="";
        $session = session();
        // if the user is already logged in, redirect to dashboard
        if ($session->has('password')) {
            return redirect()->to(base_url('dashboard'));
        }
        // Check if the remember token is present in the cookie
        if (isset($_COOKIE['auth_token'])) {
            $model = new UserModel();
            return redirect()->to(base_url('dashboard'));
        } else {
            echo view('template/header');
            echo view('login', $data);
            echo view('template/footer');
        }
    }

    public function check_login() {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $remember_me = $this->request->getPost('remember');

        $model = model('App\Models\UserModel');

        $userId = $model->checkUser($email, $password);

        if(!$userId) {
            $data['error']= "<div class=\"alert mx-auto alert-danger\" role=\"alert\" style=\"max-width:300px\"> Incorrect username or password! </div> ";
            echo view('template/header');
            echo view('login', $data);
            echo view('template/footer');
        } else {
            $activate = $model->checkActivation($email);
            if ($activate==1) {
                $session = session();
                $user = $model->getUser($email);
    
                $userData = [
                    'user_id' => $userId,
                    'email' => $email,
                    'password' => $password,
                    'fistName' => $user->firstName,
                    'lastName' => $user->lastName,
                ]; 

                $session->set('userData', $userData);
                $session->set('email', $email);
                $session->set('user_id', $userId);

                if($remember_me) {
                    $userId = $user->id;
                    $connectionToken = $user->connection_token;
                    setcookie('auth_token', $userId. ":" .$connectionToken, time() + 86400*30, "/");
                }
                return redirect()->to(base_url('dashboard'));

            } elseif ($activate==0) {
                $data['messageTitle']= "Activate account";
                $data['message'] ="Please check your email box to activate your account before log in.";
                echo view('template/header');
                echo view('template/message', $data);
                echo view('template/footer');
            };
        };

    }

    public function logout() 
    {
        $session = session();
        $session->destroy();
        //destroy the cookie
        setcookie('auth_token', '', time() - 3600, '/');
        $data['messageTitle'] = "Log out";
        $data['message'] = "You have been successfully logged out of the application.";
        echo view('template/header');
        echo view('template/message', $data);
        echo view('template/footer');
    }

    public function forgotPassword() 
    {
        echo view('template/header');
        echo view('forgotPassword');
        echo view('template/footer');

    }

    public function sentEmailPassword()
    {
        $email = $this->request->getPost('email');
        $model = new UserModel();
        $user = $model->getUser($email);
        if (!$user){
            $data['messageTitle']="User not found";
            $data['message']="Sorry, this address email is not associated to any accounts. Please try again.";
            echo view('template/header');
            echo view('message', $data);
            echo view('footer');
        } elseif ($user->activate == 0) {
            $data['messageTitle']= "Activate account";
            $data['message'] ="Please check your email box to activate your account before log in.";
            echo view('template/header');
            echo view('template/message', $data);
            echo view('template/footer');
        } else {
            $token = $model->generateToken();
            $userData['token'] = $token;
            $model->update($email, $userData);

            $resetPasswordEmail = new Email();
            $emailConf = [
                'protocol' => 'smtp',
                'wordWrap' => true,
                'SMTPHost' => 'mailhub.eait.uq.edu.au',
                'SMTPPort' => 25
            ];
            $resetPasswordEmail->initialize($emailConf);
            $resetPasswordEmail->setTo($email);
            $resetPasswordEmail->setFrom('celine.ma@uq.net.au');
            $resetPasswordEmail->setSubject('Reset your password');
            $resetPasswordEmail->setMessage('Please click the following link to reset your password' . base_url() . 'user/reset/' . $token);
            $resetPasswordEmail->send();

            $data['messageTitle']= "Email sent!";
            $data['message'] ="Please check your email box to reset your password.";
            echo view('template/header');
            echo view('template/message', $data);
            echo view('template/footer');

        }
    }

    public function setNewPassword($token) {
        $model = new UserModel();
        $userEmail = $model->checkToken($token);
        if (!$userEmail) {
            $data['messageTitle']= "Oops...";
            $data['message'] ="You are not allowed to use this link.";
            echo view('template/header');
            echo view('template/message', $data);
            echo view('template/footer');
        } else {
            $session = session();
            $session->set('userEmail', $userEmail);
            echo view('template/header');
            echo view('updatePassword');
            echo view('template/footer');
        }
    }

    public function updatePassword() {
        $session = session();
        $email = session()->get('userEmail');
        
        $rules = [
            'password'=>'required|min_length[8]|max_length[100]',
            'cPassword'=>'matches[password]'
        ];
        
        if($this->validate($rules)) 
        {
            $model = new UserModel();

            $password = $this->request->getPost('password');
            $db_password = password_hash($password, PASSWORD_BCRYPT);

            $userData['password'] = $db_password;
            $userData['token'] = "";

            $model->updateUser($email, $userData);
            $session->destroy();
            
            $data['messageTitle'] = 'Password updated!';
            $data['message'] = 'Your password has been updated. Please log in.';
            echo view('template/header');
            echo view('template/message', $data);
            echo view('template/footer');

        } else {
            $data['validation']=$this->validator;
            echo view('template/header');
            echo view('updatePassword', $data);
            echo view('template/footer');
        }

    }
}