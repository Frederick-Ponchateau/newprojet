<?php

namespace App\Controllers;

use App\Models\UserModel;
class Login extends BaseController
{
	public function index()
	{	

		/** exemple de passage de variable a une vue */ 
		$this->aff_form_log('Connexion à wwww.site.com' ,false);
		
	}
	public function connect()
	{
		  //include helper form
		  helper('form');
		  //set rules validation form
		  $rules = [
			  
			  'email'         => 'required|min_length[6]|max_length[50]|valid_email',
			  'password'      => 'required|min_length[6]|max_length[200]',
			 
		  ];
		   
		  if($this->validate($rules)){
			 
			  $userModel = new UserModel();
			 
			 // $model->find($data);
			  $tabUsers = $userModel->where('userEmail',$this->request->getVar('email'))
                   ->findAll();
				   foreach($tabUsers as $key=>$user){


					  if(password_verify($this->request->getVar('password'),$user['userPassword'])){
					
							$this->session->set(['id'=> $user["userId"]]);	
							var_dump($this->session->get('id'));
							 return redirect()->to('/admin/accueil');
								
					  } 
				   }
				   				 
			}
		 
			  $this->aff_form_log('Register à wwww.site.com' ,false,$this->validator);

	}
	private function aff_form_log($page_title="",$aff_menu=false,$validation=null){
		$data = [
			'page_title' => $page_title ,
			'aff_menu'  => $aff_menu,
			'validation' => $validation
		];

		echo view('common/HeaderAdmin' , 	$data);
		echo view('site/login', $data);
		echo view('common/FooterSite');

	}
}
