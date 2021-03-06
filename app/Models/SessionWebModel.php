<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class SessionWebModel extends Model{
    protected $table = 'sessionweb';
    protected $allowedFields = ['id_session','email','nom','prenom','userCreatedAt'];
}