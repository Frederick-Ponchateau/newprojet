<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\RoleModel;
use App\Models\ArtistesModel;
use App\Models\FilmModel;
use App\Controllers\BaseController;

class Role extends BaseController{
    public $roleModel = null;
    public $filmMode = null;
    public $artistesModel = null;
    public function __construct(){
        $this->roleModel = new RoleModel();
        $this->filmModel = new FilmModel();
        $this->artistesModel = new ArtistesModel();
    }

    public function index(){

        $listeRole = $this->roleModel->findAll();
        $filmModel = $this->filmModel;
        $artistesModel= $this->artistesModel;
        /*********************************************
         * * exemple de passage de variable a une vue
         * * Data view admin artiste 
         *********************************************/ 
        $data = [
            'page_title' => 'Admin > Role Liste' ,
            'aff_menu'  => true ,
            'tablerole' => $this->roleModel->orderBy('nom_role','ASC')->paginate(10),
            'tableFilm' => $filmModel,
            'tableArtiste' => $artistesModel,
            'pager' => $this->roleModel->pager,
        ];

    echo view('common/HeaderAdmin' , 	$data);
    echo view('Admin/Role/Liste', $data);
    echo view('common/FooterSite');

    }
}    

?>