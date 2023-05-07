<?php 

namespace App\Controllers;
use App\Models\OfferModel;

class Dashboard extends BaseController {

    public function index() {
        $session = session();
        if (!isset($_SESSION['user_id'])) 
        {
            return redirect()->to(base_url('login'));
        }
        $model = new OfferModel();
        $allOffers =  $model->getAllOffers();
        $data['allOffers'] = $allOffers;
        echo view('template/navbar');
        echo view('dashboard', $data);
    }

}