<?php

namespace App\Controllers;

use App\Models\UserModel;
class Login extends BaseController
{
	public function index()
	{	

		/** exemple de passage de variable a une vue */ 
		$data = [
			'page_title' => 'Connexion à wwww.site.com' ,
			'aff_menu'  => false
		];

		echo view('common/HeaderAdmin' , 	$data);
		echo view('Site/Login');
		echo view('common/FooterSite');
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
			  echo "je s8 la";
			  $userModel = new UserModel();
			 
			 // $model->find($data);
			  $tabUsers = $userModel->where('userEmail',$this->request->getVar('email'))
                   ->findAll();
				   foreach($tabUsers as $user){
					   var_dump($user);
					  if(password_verify($this->request->getVar('password'),$user['userPassword'])){
						var_dump($user['userId']);
						return $user['userId'];				
					  } 
				   }
				   
			  // return redirect()->to('/login');
			}
		 
			  
			  $data = [
				  'page_title' => 'Register à wwww.site.com' ,
				  'aff_menu'  => false,
				  'validation' => $this->validator
			  ];
	  
			  echo view('common/HeaderAdmin' , 	$data);
			  echo view('register', $data);
			  echo view('common/FooterSite');
		  


	}

}
