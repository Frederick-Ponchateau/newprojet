<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\ArtisteModel;
use App\Controllers\BaseController;

class Artiste extends BaseController
{

	public function index(){

        /** exemple de passage de variable a une vue */ 
        $data = [
            'page_title' => 'Admin > Artiste Liste' ,
            'aff_menu'  => true
        ];


    echo view('common/HeaderAdmin' , 	$data);
    echo view('Admin/Artiste');
    echo view('common/FooterSite');

    }

}