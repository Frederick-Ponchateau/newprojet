<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class RegionModel extends Model{
    protected $table = 'region';
    protected $allowedFields = ['code','nom','langue'];
}