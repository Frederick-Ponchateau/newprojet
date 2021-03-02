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
			  $data = [
				  'userEmail'    => $this->request->getVar('email'),
				  
			  ];
			 // $model->find($data);
			  $users = $userModel->where('userEmail',$data["userEmail"])
                   ->findAll();
				   var_dump($data);
				   var_dump($users);
			  // return redirect()->to('/login');
			}
		//   }else{
			  
		// 	  $data = [
		// 		  'page_title' => 'Register à wwww.site.com' ,
		// 		  'aff_menu'  => false,
		// 		  'validation' => $this->validator
		// 	  ];
	  
		// 	  echo view('common/HeaderAdmin' , 	$data);
		// 	  echo view('register', $data);
		// 	  echo view('common/FooterSite');
		//   }


	}

}
