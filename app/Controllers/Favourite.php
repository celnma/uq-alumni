<?php

namespace App\Controllers;
use CodeIgniter\Controller;

use App\Models\OfferModel;
use App\Models\CommentModel;
use App\Models\LikeModel;
use App\Models\FavouriteModel;
use App\Models\ApplicationModel;

class Favourite extends BaseController {

    public function index() {
        $session = session();
        if (!isset($_SESSION['user_id'])) {
            return redirect()->to(base_url('login'));
        } 
        $userId = session()->get('user_id');
        $favourite = new FavouriteModel();
        $data['allFavourites'] = $favourite->getUserAllFavourites($userId);
        echo view('template/navbar');
        echo view('favourite', $data);

    }
}