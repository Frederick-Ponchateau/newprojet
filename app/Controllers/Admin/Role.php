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

    public function edit($idFilm=null,$idActeur=null){
        /*********Je controle si je viens du formulaire ******/
        if(!empty($this->request->getVar('save'))){
            $save = $this->request->getVar('save');
                $rules = [
                    'nom'          => 'required|min_length[3]|max_length[20]',
                    'prenom'         => 'required|min_length[3]|max_length[20]',
                    'annee'      => 'required'
                ];
                /**************** Je controle si les informations posté son corecte ***********************
                 **************** Pour nom la longueur minimal est de 3 et la longueur maximal est de 20 caractère requit */
                if($this->validate($rules)){
                    
                    $data_save = [
                        'nom'     => $this->request->getVar('nom'),
                        'prenom'    => $this->request->getVar('prenom'),
                        'annee_naissance' => $this->request->getVar('annee')
                    ];
                    if($save == 'update'){
                        $this->roleModel->where('id',$id)
                        ->set($data_save)
                        ->update();
                    }else{
                        $this->roleModel->save($data_save);
                        return redirect()->to('/Admin/Role');
                    }           
                }
                // return redirect()->to('/');
        }
        // $role = $this->roleModel->where('id', $id)->first();
        // $role = $this->roleModel->where('id', $id)->first();
        // $role = $this->roleModel->where('id', $id)->first();
       // dd($artiste);
       $data = [
        'page_title' => 'Admin > Artiste Edit' ,
        'aff_menu'  => true ,
        //'artiste' => $artiste
        
    ];

        
    echo view('common/HeaderAdmin' , 	$data);
    echo view('Admin/Role/Edit', $data);
    echo view('common/FooterSite');
    }
}    

?>