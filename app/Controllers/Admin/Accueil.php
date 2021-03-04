<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Controllers\BaseController;

class Accueil extends BaseController
{
	public function logout(){

		$this->session->destroy();

     return redirect()->to('/login');

	}
	


	
		
		//return redirect()->to('/login');
		
	public function index()
	{		

		$this->bypass('/login');
		//var_dump($this->session->get('id'));
		/** exemple de passage de variable a une vue */ 
		$data = [
			'page_title' => 'Connexion à wwww.site.com' ,
			'aff_menu'  => true
		];

		echo view('common/HeaderAdmin' , 	$data);
		echo view('Admin/Accueil');
		echo view('common/FooterSite');
	}
}
