<?php 

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model {

    protected $table = 'comments';
    protected $primaryKey = 'id';

    protected $allowedFields = ['user_id', 'offer_id', 'parent_id', 'content', 'posted_at'];

    public function __construct() 
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getComment($id) 
    {
        return $this->db->table($this->table)
                        ->where($primaryKey, $id)
                        ->get()
                        ->getRow();
    }

    public function addComment($data)
    {
        return $this->insert($data);
    }

    public function deleteComment($id) 
    {
        return $this->delete($id);
    }

    public function getAllComments($offerId) 
    {
        return $this->where('offer_id', $offerId)
                    ->orderBy('posted_at', 'DESC')
                    ->findAll();
    }
    
    public function getReplies($commentId)
    {
        return $this->where('parent_id', $commentId)->findAll();
    }

    public function getParentComment($commentId)
    {
        return $this->where('id', $commentId)->first();
    }

    


}