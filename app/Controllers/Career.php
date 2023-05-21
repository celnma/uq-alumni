<?php

namespace App\Controllers;

use App\Models\OfferModel;

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
        $offers = $model->getUserOffers($userId);
        $data['userOffers'] = $offers;
        echo view('template/navbar');
        echo view('career', $data);
        
    }

    public function new_offer_form() 
    {
        $session = session();
        if (!isset($_SESSION['user_id'])) 
        {
            return redirect()->to(base_url('login'));
        };
        echo view('template/navbar');
        echo view('addOfferForm');
    }

    public function application_form($offerId) {
        $session = session();
        if (!isset($_SESSION['user_id'])) 
        {
            return redirect()->to(base_url('login'));
        };
        $model = new OfferModel();
        $offer = $model->getOffer($offerId);
        $offerData = get_object_vars($offer);
        echo view('template/navbar');
        echo view('template/offerApply', $offerData);

    }
}

