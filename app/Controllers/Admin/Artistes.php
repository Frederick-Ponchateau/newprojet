<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\ArtisteModel;
use App\Controllers\BaseController;

class Artistes extends BaseController
{
    public $artistesModels = null;
    public function __construct(){
        $this->artistesModels = new ArtisteModel();
    }
	public function index(){

        $listeArtistes = $this->artistesModels->findAll();
        //dd($listeArtistes);
        /*********************************************
         * * exemple de passage de variable a une vue
         * * Data view admin artiste 
         *********************************************/ 
        $data = [
            'page_title' => 'Admin > Artiste Liste' ,
            'aff_menu'  => true ,
            'tableArtistes' => $listeArtistes
        ];


    echo view('common/HeaderAdmin' , 	$data);
    echo view('Admin/Artistes/Liste', $data);
    echo view('common/FooterSite');

    }
    public function delete($id=null){
        //$this->artistesModels->where('id', $id)->delete();
       

    }
    public function edit($id=null){
         
        $artiste = $this->artistesModels->where('id', $id)->first();
        /*********Je controle si je viens du formulaire ******/
        if(!empty($this->request->getVar('save'))){

        }
       // dd($artiste);
       $data = [
        'page_title' => 'Admin > Artiste Edit' ,
        'aff_menu'  => true ,
        'artiste' => $artiste
        
    ];

        
    echo view('common/HeaderAdmin' , 	$data);
    echo view('Admin/Artistes/Edit', $data);
    echo view('common/FooterSite');
    }
}