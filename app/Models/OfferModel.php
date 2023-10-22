<?php 

namespace App\Models;

use CodeIgniter\Model;

class OfferModel extends Model { 
    
    protected $table = 'offers';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title', 'description', 'company', 
        'city', 'state', 'country', 
        'user_id', 'offer_file'
    ];
    protected $useTimestamps = true;
    protected $createdFiled = 'created_at';
    protected $updatedField = "updated_at";

    protected $dbGroup = 'default';

    public function __construct() 
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getUserOffers($userId)
    {
        return $this->where('user_id', $userId)
                    ->findAll();
    }

    public function getAllOffers() {
        return $this->findAll();
    }
    
    public function getOffer($offerId)
    {
        return $this->db->table($this->table)
                        ->where($this->primaryKey, $offerId)
                        ->get()
                        ->getRow();
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

    public function searchOffer($query) {
        if ($query != "") {
            return $this->db->table($this->table)
                    ->like('title', $query)
                    ->orLike('company', $query)
                    ->orLike('city', $query)
                    ->orLike('state', $query)
                    ->orLike('country', $query)
                    ->orderBy('title', 'ASC')
                    ->get();
        } else {
            return "";
        }
    }

}