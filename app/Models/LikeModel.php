<?php 

namespace App\Models;

use CodeIgniter\Model;

class LikeModel extends Model {

    protected $table = 'likes';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['user_id', 'offer_id', 'created_at'];

    public function __construct() 
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }
    // Check if a user has liked an offer
    public function getUserLike($offerId, $userId) {
        $like = $this->db->table($this->table)
                ->where('user_id', $userId)
                ->where('offer_id', $offerId)
                ->get()
                ->getRow();
        if (!empty($like)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function addLike($data) {
        return $this->insert($data);
    }

    public function removeLike($offerId, $userId) {
        return $this->db->table($this->table)
                        ->where('user_id', $userId)
                        ->where('offer_id', $offerId)
                        ->delete();
    }
}