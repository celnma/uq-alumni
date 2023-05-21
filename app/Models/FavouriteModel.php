<?php 

namespace App\Models;

use CodeIgniter\Model;

class FavouriteModel extends Model {

    protected $table = 'favourites';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['user_id', 'offer_id', 'added_at'];

    public function __construct() 
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }
    // Check if offer is in user's favourite
    public function isUserFavourite($offerId, $userId) {
        $favourite = $this->db->table($this->table)
                ->where('user_id', $userId)
                ->where('offer_id', $offerId)
                ->get()
                ->getRow();
        if (!empty($favourite)) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserAllFavourites($userId) {
        return $this->db->table($this->table)
                        ->select('offers.*')
                        ->join('offers', 'offers.id = favourites.offer_id')
                        ->where('favourites.user_id', $userId)
                        ->get()
                        ->getResult();
    }
    
    public function addFavourite($data) {
        return $this->insert($data);
    }

    public function removeFavourite($offerId, $userId) {
        return $this->db->table($this->table)
                        ->where('user_id', $userId)
                        ->where('offer_id', $offerId)
                        ->delete();
    }
}