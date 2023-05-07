<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;
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
        $userData = [
            'firstName'=>$user->firstName,
            'lastName'=>$user->lastName,
            'email'=>$user->email
        ];
        // session()->set('userData', $userData);
        echo view('template/navbar');
        echo view('settings', $userData);
        
    }

    public function update() 
    {
        $session = session();

        if (!isset($_SESSION['user_id'])) 
        {
            return redirect()->to(base_url('login'));
        };

        $model = new UserModel();
        $email = session()->get('email');
        $user = $model->getUser($email);

        $resume = NULL;
        $resumeFile = $this->request->getFile('resumeFile');
        if ($resumeFile !== NULL && $resumeFile->isValid() && !$resumeFile->hasMoved()) {
            $resumeFile = $this->request->getFile('resumeFile');
            $resumeFile->move(WRITEPATH .'uploads');
            $resume = $file->getName();
        }

        $changedData = [
            'firstName' => $this->request->getPost('firstName'),
            'lastName' => $this->request->getPost('lastName'),
            'email' => $this->request->getPost('email'),
            'resume_file' => $resume
        ];

        $model->updateUser($email, $changedData);

        // $newUserData = array_merge($userData, $changedData);
        // session()->set('userData', $newUserData);
        return redirect()->to(base_url('settings'));

    }
}
