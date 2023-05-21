<?php 

namespace App\Controllers;
use App\Models\OfferModel;
use App\Models\CommentModel;
use App\Models\LikeModel;
use App\Models\FavouriteModel;

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

    public function fetch() {
        $query = $this->request->getVar('query');
        if (!empty($query)) {
            $model = new OfferModel();
            $offerData = $model->searchOffer($query);
            $data['offers']=$offerData->getResultArray();
            return json_encode($data);
        } else {
            return "";
        }
    }

    public function view_offer($offerId) {
        $session = session();
        if (!isset($_SESSION['user_id'])) {
            return redirect()->to(base_url('login'));
        } 
        $userId = $_SESSION['user_id'];
        // get offer information 
        $offerModel = new OfferModel();
        $offer = $offerModel->getOffer($offerId);
        $offerData = get_object_vars($offer);
        //check if user has liked offer 
        $likeModel = new LikeModel();
        $hasLiked = $likeModel->getUserLike($offerId, $userId);
        $offerData['hasLiked'] = $hasLiked;
        // check if offer is in user's favourite 
        $favouriteModel = new FavouriteModel();
        $isFavourite = $favouriteModel->isUserFavourite($offerId, $userId);
        $offerData['isFavourite'] = $isFavourite;
        // get offer comments
        $commentModel = new CommentModel();
        $allComments = $commentModel->getAllComments($offerId);
        $commentData = [
            'offerAllComments' => $allComments
        ];
        echo view('template/navbar');
        echo view('template/offerView', $offerData);
        echo view('template/offerComment', $commentData);
    }

}