<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\ArtisteModel;
use App\Controllers\BaseController;

class Artistes extends BaseController
{
    public function __construct(){
        $artistes = new ArtisteModel();

    }
	public function index(){

        /*********************************************
         * * exemple de passage de variable a une vue
         * * Data view admin artiste 
         *********************************************/ 
        $data = [
            'page_title' => 'Admin > Artiste Liste' ,
            'aff_menu'  => true ,
            'couleur' => 'bleu'
        ];


    echo view('common/HeaderAdmin' , 	$data);
    echo view('Admin/Artistes', $data);
    echo view('common/FooterSite');

    }

}