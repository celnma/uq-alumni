<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\OfferModel;

class Offer extends BaseController {
    
    public function add_offer()
    {   
        $session = session();
        if (!isset($_SESSION['user_id'])) {
            return redirect()->to(base_url('login'));
        } 

        // Get the current user's ID from the session
        $userId = session()->get('user_id');
        
        // Get the offer data from the request
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $company = $this->request->getPost('company');
        $city = $this->request->getPost('city');
        $state = $this->request->getPost('state');
        $country = $this->request->getPost('country');
        // Upload optional file associated 
        $fileName = NULL;
        $file = $this->request->getFile('userFile');
        if ($file !== null /* && $file->isValid() && !$file->hasMoved() */) 
        {
            $file = $this->request->getFile('userFile');
            $file->move(WRITEPATH .'uploads');
            $fileName = $file->getName();
        }
        // Create a new offer record in the database
        $offerModel = new OfferModel();
        $data = [
            'title' => $title,
            'description' => $description,
            'company' => $company,
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'user_id' => $userId,
            'file' => $fileName
        ];
        $offerModel->addOffer($data);
        
        // Redirect to the user's offers page
        return redirect()->to(base_url('career'));
    }

}