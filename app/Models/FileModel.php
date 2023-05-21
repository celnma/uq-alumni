<?php

namespace App\Models;
use CodeIgniter\Model;

use App\Models\UserModel;
use App\Models\OfferModel;

class FileModel extends Model {

    protected $useDatabase = false;

    public function upload_user_file($userId, $userEmail, $inputName) {
        
        $config['upload_path']          = './uploads/user';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 10000;
        $config['file_name']            = "resume_".$userId.".pdf";

        $this->upload->initialize($config);

        if (!$this->upload->do_upload($inputName))
        {
            return false;
        }
        else
        {
            $fileData = $this->upload->data();
            $data = [
                'resume_file' => $fileData['file_name']
            ];
            return $data;
        }
    }


}