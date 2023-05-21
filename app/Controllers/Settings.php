<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;

use CodeIgniter\Files\File;
use Config\Services;

use App\Models\UserModel;


class Settings extends BaseController {

    public function index() 
    {
        $session = session();
        // Check if user is logged in 
        if (!isset($_SESSION['user_id'])) 
        {
            return redirect()->to(base_url('login'));
        };
        // Career page for user 
        $model = new UserModel();
        $email = $_SESSION['email'];
        $user = $model->getUser($email);

        $userData = get_object_vars($user);
        /* $userData = [
            'firstName'=>$user->firstName,
            'lastName'=>$user->lastName,
            'email'=>$user->email
        ]; */ 
        // session()->set('userData', $userData);
        echo view('template/navbar');
        echo view('settings', $userData);
        
    }

    public function update_picture() {
        $session = session();
        if (!isset($_SESSION['user_id'])) 
        {
            return redirect()->to(base_url('login'));
        };
        $userId = $_SESSION['user_id'];
        $rules = [
            'profilePicture' => 'uploaded[profilePicture]|mime_in[profilePicture,image/jpeg,image/png]'
        ];
        $picture = $this->request->getFile('profilePicture');
        if ($this->validate($rules)){
            // Image resizing configuration
            $config = [
                'image_library' => 'gd2',
                'source_image' => $picture->getTempName(),
                'maintain_ratio' => true,
                'width' => 800, // Desired width of the resized image
                'height' => 800, // Desired height of the resized image
            ];
            $imageManipulation = Services::image();
            $imageManipulation->withFile($picture)->configure($config);
            if (!$imageManipulation->resize($config['width'], $config['height'], $config['maintain_ratio'], 'auto')) {
                $error = 'Image resize failed';
                return 'error';
            } else {
                $newName = $picture->getRandomName();
                $imageManipulation->setName($newName);
                $imageManipulation->move(WRITEPATH.'uploads/'.'picture', $newName);
                // Update image name in user data
                $user = new UserModel();
                $user->updateUser($userId, array('picture_file'=>$newName));
                return $newName;
            }   
        } else {
            return 'error';
        }
    }

    public function update() 
    {
        $session = session();

        if (!isset($_SESSION['user_id'])) 
        {
            return redirect()->to(base_url('login'));
        };

        $user = new UserModel();

        $email = session()->get('email');
        $userId = $_SESSION['user_id'];

        // update user info
        $userInfo = [
            'firstName' => $this->request->getPost('firstName'),
            'lastName' => $this->request->getPost('lastName'),
            'email' => $this->request->getPost('email'),
        ];
        $user->updateUser($userId, $userInfo);

        $rules = [
            'resume' => 'uploaded[resume]|ext_in[resume,pdf]'
        ];

        // If user upload resume file
        if ($this->validate($rules)) {
            $file = $this->request->getFile('resume');
            $newName = $file->getRandomName();
            $file->move(WRITEPATH.'uploads/'.'user', $newName);
            $user->updateUser($email, array('resume_file' => $newName));
        } else {
            $data = ['errors' => $this->validator->getErrors()];
            return redirect()->to(base_url('settings'))->with('message', $data);
        }
        $data['message'] = "Profile updated!";
        return redirect()->to(base_url('settings'))->with('message', $data);
    }

    public function preview($resume_file) 
    {
        helper(['download','response']);
        $filePath = "/var/www/htdocs/alumni/writable/uploads/user/".$resume_file;
        $mimeType = mime_content_type($filePath);
        $this->response->setHeader('Content-Type', $mimeType);
        return readfile($filePath);
    }

    public function download($resume_file) 
    {
        helper(['download','response']);
        $filePath = "/var/www/htdocs/alumni/writable/uploads/user/".$resume_file;
        return $this->response->download($filePath, NULL);
    }
}
