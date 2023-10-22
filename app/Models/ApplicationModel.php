<?php 

namespace App\Models;

use CodeIgniter\Model;

class ApplicationModel extends Model {

    protected $table = 'applications'; 
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id', 'user_id', 'offer_id',  
        'resume_file', 'cover_letter_file', 'created_at',
    ];

    public function __construct() 
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function addApplication($data)
    {
        return $this->db->table($this->table)->insert($data);
        return $this->db->insertID(); 
    }

}