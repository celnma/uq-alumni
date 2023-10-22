<?php

namespace App\Controllers;
use CodeIgniter\Controller;

use App\Models\OfferModel;
use App\Models\CommentModel;
use App\Models\LikeModel;
use App\Models\FavouriteModel;
use App\Models\ApplicationModel;

class Offer extends BaseController {
    
    public function add_offer()
    {   
        $session = session();
        if (!isset($_SESSION['user_id'])) {
            return redirect()->to(base_url('login'));
        } 
        // Get the current user's ID from the session
        $userId = session()->get('user_id');
        // Upload optional file associated 
        $rules = [
            'offerFile' => 'uploaded[offerFile]'
        ];
        if ($this->validate($rules)) {
            $file = $this->request->getFile('offerFile');
            $newName = $file->getRandomName();
            $file->move(WRITEPATH.'uploads/'.'offer',$newName);
        } else {
            $newName = NULL;
        } 
        // Get the offer data from the request
        $offerModel = new OfferModel();
        $offerData = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'company' => $this->request->getPost('company'),
            'city' => $this->request->getPost('city'),
            'state' => $this->request->getPost('state'),
            'country' => $this->request->getPost('country'),
            'user_id' => $userId,
            'offer_file' => $newName
        ];
        $offerModel->addOffer($offerData);
        return redirect()->to(base_url('career'));
    }

    public function addComment($offerId) {
        $session = session();
        if (!isset($_SESSION['user_id'])) {
            return redirect()->to(base_url('login'));
        }
        $userId = $_SESSION['user_id'];
        $content = $this->request->getPost('newComment');
        if (!empty($content)) {
            $data = [
                'user_id' => $userId,
                'offer_id' => $offerId,
                'parent_id'=> NULL, 
                'content' => $content,
            ];
            $model = new CommentModel();
            $model->addComment($data);
            return redirect()->to(base_url().'dashboard/offer/'.$offerId);
        } else {
            return "error";
        }
    }

    public function likeOffer($offerId) {
        $session = session();
        if (!isset($_SESSION['user_id'])) {
            return redirect()->to(base_url('login'));
        }
        $userId = $_SESSION['user_id'];
        $likeModel = new LikeModel();
        $hasLiked = $likeModel->getUserLike($offerId, $userId);
        if (!$hasLiked) {
            $data = [
                'user_id'=>$userId, 
                'offer_id'=>$offerId
            ];
            $likeModel->addLike($data);
            return json_encode(array('success' => true));
        } else {
            return json_encode(array('success' => false));
        } 
    }

    public function removeLike($offerId) {
        $session = session();
        if (!isset($_SESSION['user_id'])) {
            return redirect()->to(base_url('login'));
        }
        $userId = $_SESSION['user_id'];
        $likeModel = new LikeModel();
        $hasLiked = $likeModel->getUserLike($offerId, $userId);
        if ($hasLiked) {
            $likeModel->removeLike($offerId, $userId);
            return json_encode(array('success' => true));
        } else {
            return json_encode(array('sucess' => false));
        }
    }

    public function addFavourite($offerId) {
        $session = session();
        if (!isset($_SESSION['user_id'])) {
            return redirect()->to(base_url('login'));
        }
        $userId = $_SESSION['user_id'];
        $favouriteModel = new favouriteModel();
        $isFavourite = $favouriteModel->isUserFavourite($offerId, $userId);
        if (!$isFavourite) {
            $data = [
                'user_id'=>$userId, 
                'offer_id'=>$offerId
            ];
            $favouriteModel->addFavourite($data);
            return json_encode(array('success' => true));
        } else {
            return json_encode(array('success' => false));
        } 
    }

    public function removeFavourite($offerId) {
        $session = session();
        if (!isset($_SESSION['user_id'])) {
            return redirect()->to(base_url('login'));
        }
        $userId = $_SESSION['user_id'];
        $favouriteModel = new FavouriteModel();
        $isFavourite = $favouriteModel->isUserFavourite($offerId, $userId);
        if ($isFavourite) {
            $favouriteModel->removeFavourite($offerId, $userId);
            return json_encode(array('success' => true));
        } else {
            return json_encode(array('sucess' => false));
        }
    }
    

    public function submit_application($offerId) {
        $session = session();
        $userId = $_SESSION['user_id'];

        $rules = [
            'resume_file' => 'uploaded[resume_file]',
            //'cover_letter_file' => 'uploaded[cover_letter_file]'
        ];
        
        $resume_file = NULL;
        $cover_letter_file = NULL;

        if ($this->validate($rules)) {
            $resume = $this->request->getFile('resume_file');
            $resume_file = $resume->getRandomName();
            $resume->move(WRITEPATH.'uploads/'.'application', $resume_file);
            $data = [
                'user_id'=>$userId,
                'offer_id'=>$offerId,
                'resume_file' => $resume_file,
                'cover_letter_file'=>NULL
            ];
            $application = new ApplicationModel();
            $application->addApplication($data);
            $data['messageTitle'] = 'Submitted!';
            $data['message'] = 'Your application has been successfully submitted. Thank you for applying! ';
            echo view('template/navbar');
            echo view('template/message', $data);
        } else {
            $data['validation'] = $this->validator;
            echo $data['validation']->listErrors(); 
        }

        
        
    }

}