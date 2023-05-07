<?php 

namespace App\Models;

use CodeIgniter\Model;

class OfferModel extends Model { 
    
    protected $table = 'offers';
    protected $primaryKey = ['id', 'user_id'];

    protected $allowedFields = [
        'title', 'description', 'company', 
        'city', 'state', 'country', 
        'user_id', 'file'
    ];
    protected $useTimestamps = true;
    protected $createdFiled = 'created_at';
    protected $updatedField = "updated_at";

    protected $dbGroup = 'default';

    public function getUserOffers($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }

    public function getAllOffers() {
        return $this->findAll();
    }
    
    public function getOffer($offerId)
    {
        return $this->find($offerId);
    }
    
    public function addOffer($data)
    {
        return $this->insert($data);
    }
    
    public function updateOffer($offerId, $data)
    {
        return $this->update($offerId, $data);
    }
    
    public function deleteOffer($offerId)
    {
        return $this->delete($offerId);
    }

}