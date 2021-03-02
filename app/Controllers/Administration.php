<?php

namespace App\Controllers;

class Administration extends BaseController
{
	public function index()
	{	

		/** exemple de passage de variable a une vue */ 
		$data = [
			'page_title' => 'Connexion à wwww.site.com' ,
			'aff_menu'  => true
		];

		echo view('common/HeaderAdmin' , 	$data);
		echo view('Admin/Accueil');
		echo view('common/FooterSite');
	}

	public function users(){

			/** exemple de passage de variable a une vue */ 
			$data = [
				'page_title' => 'Admin > User Liste' ,
				'aff_menu'  => true
			];
	

		echo view('common/HeaderAdmin' , 	$data);
		echo view('Admin/Users');
		echo view('common/FooterSite');

	}

}
