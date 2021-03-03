<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class ArtisteModel extends Model{
    protected $table = 'artiste';
    protected $allowedFields = ['id','nom','prenom','annee_naissance'];
}