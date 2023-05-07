<?php 

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {

    protected $table = 'users'; 
    protected $primaryKey = 'email';

    protected $allowedFields = [
        'id', 'firstName', 'lastName', 'email', 'password', 'created_at',
        'token', 'activate', 'resume_file',
        'connection_token'
    ];

    protected $dbGroup = 'default'; 

    // Define the connection to database in the construction method 
    public function __construct() 
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getUser($email)
    {
        return $this->db->table($this->table)
            ->where($this->primaryKey, $email)
            ->get()
            ->getRow();
    }

    public function getAllUsers()
    {
        return $this->db->table($this->table)
            ->get()
            ->getResult();
    }

    public function addUser($data)
    {
        // Add user information into database
        $this->db->table($this->table)->insert($data);
        return $this->db->insertID(); 
        // insertID method provied by CI will return the id of the newly added user (if successfully added to db) 
        // the returned id can be used to create a session 
    }

    public function generateToken() 
    {
        $token = bin2hex(random_bytes(25));
        return $token;
    }

    public function activateUser($token) 
    {
        // Check if token exists in database
        $user = $this->db->table($this->table)
                    ->where('token', $token)
                    ->get()
                    ->getRow();
        // If token is valid, activate user and delete token 
        if ($user) 
        {
            $user_id = $user->id;
            $this->db->table($this->table)
                    ->where('email', $user->email)
                    ->update(array('activate' => 1, 'token' => ''));
            return true;
        }
        return false;
        return $user;
    }

    public function updateUser($email, $data)
    {
        $this->db->table($this->table)
            ->where($this->primaryKey, $email)
            ->update($data);
    }

    public function deleteUser($email)
    {
        $this->db->table($this->table)
            ->where($this->primaryKey, $email)
            ->delete();
    }

    public function checkUser($email, $password) 
    {
        $user = $this->db->table($this->table)
                ->where($this->primaryKey, $email)
                ->get()
                ->getRow();
        
        if ($user && password_verify($password, $user->password)) {
            $connectionToken = bin2hex(random_bytes(16));
            $this->db->table($this->table)  
                    ->where($this->primaryKey, $user->email)
                    ->update(array('connection_token' => $connectionToken));
            return $user->id;
        } else {
            return false;
        }
    }

    public function checkUserWithConnectionToken($remember_token) {
        list($id, $token) = explode(':', $remember_token);
        $user = $this->db->table($this->table)
                    ->where('id', $id)
                    ->where('connection_token', $token)
                    ->get()
                    ->getRow();
        if($user){
            /* $newToken = bin2hex(random_bytes(16));
            $this->db->table($this->table)
                    ->where('id', $id)
                    ->update(array('connection_token' => $newToken)); 
            return $user; */
        } else {
            return false;
        }
    }

    public function checkActivation($email) 
    {
        $user = $this->db->table($this->table)
                        ->where($this->primaryKey, $email)
                        ->get()
                        ->getRow();
        return $user->activate;
    }

    public function checkToken($token) 
    {
        $user = $this->db->table($this->table)
                    ->where('token', $token)
                    ->get()
                    ->getRow();
        if ($user) {
            return $user->email;
        } else {
            return false;
        }
    }

}