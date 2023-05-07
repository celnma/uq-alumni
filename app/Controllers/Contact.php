<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;
use App\Models\UserModel;

class Contact extends BaseController {

    public function index() 
    {   
        $session = session();
        // Check if user is logged in 
        if (!isset($_SESSION['user_id'])) 
        {
            return redirect()->to(base_url('login'));
        };
        echo view('template/navbar');
        echo view('contact');
    }

}
