<?php

namespace App\Controllers;

class Career extends BaseController {

    public function index() 
    {
        $session = session();
        // Check if user is logged in 
        if (!isset($_SESSION['user_id'])) 
        {
            return redirect()->to(base_url('login'));
        };
        // Career page for user 
        $userId = $_SESSION['user_id'];
        $model = model('App\Models\OfferModel');
        $data['userOffers'] = $model->getUserOffers($userId);
        echo view('template/navbar');
        echo view('career', $data);
        
    }

    public function add_offer_form() 
    {
        $session = session();
        if (!isset($_SESSION['user_id'])) 
        {
            return redirect()->to(base_url('login'));
        };
        echo view('template/navbar');
        echo view('addOfferForm');
    }
}

