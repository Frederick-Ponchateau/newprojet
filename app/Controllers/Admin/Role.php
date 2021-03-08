<?php

namespace App\Controllers\Admin;
use CodeIgniter\Controller;
/******************* Appel des model utilisé ******************/
use App\Models\RoleModel;
use App\Models\ArtistesModel;
use App\Models\FilmModel;
use App\Controllers\BaseController;

class Role extends BaseController{
    public $roleModel = null;
    public $filmModel = null;
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
    public function delete($idFilm=null,$idActeur=null,$page=null){
        $and = [ 
            'id_film' => $idFilm,
            'id_acteur' => $idActeur  
        ];
        $this->roleModel->where($and)->delete();
        if(!empty($page)){
            return redirect()->to('/Admin/Role?page='.$page);
        }
        return redirect()->to('/Admin/Role');

    }

    public function edit($idFilm=null,$idActeur=null){


        /*********Je controle si je viens du formulaire ******/
        if(!empty($this->request->getVar('save'))){

            $save = $this->request->getVar('save');

                 $rules = [
                     'idFilm'          => 'required',
                     'idActeur'         => 'required',
                    'nomRole'      => 'required'
                 ];
                
                /**************** Je controle si les informations posté son corecte ***********************
                 **************** Pour nom la longueur minimal est de 3 et la longueur maximal est de 20 caractère requit */
                if($this->validate($rules)){
                    
                     $data_save = [
                        'id_film'     => intval($this->request->getVar('idFilm')),
                        'id_acteur'    => intval($this->request->getVar('idActeur')),
                        'nom_role' => $this->request->getVar('nomRole')
                    ];
                    //var_dump($data_save);
                    if($save == 'update'){
                       $andAdd= [
                        'id_film'     => intval($idFilm),
                        'id_acteur'    => intval($idActeur)
                       ];
                     //dd($andAdd);
                       $test=  $this->roleModel->where($andAdd)
                        ->set($data_save)
                        ->update();
                        
                     }else{
                        $this->roleModel->save($data_save);
                        return redirect()->to('/Admin/Role');
                    }           
                }
                return redirect()->to('/Admin/Role');
        }
        $and = [ 
            'id_film' => $idFilm,
            'id_acteur' => $idActeur  
        ];
        $listeRole = $this->roleModel->where($and)->first();
        $filmModel = $this->filmModel->orderBy('titre','ASC')->findAll();
        $artistesModel= $this->artistesModel->orderBy('nom','ASC')->findAll();
        
       $data = [
        'page_title' => 'Admin > Artiste Edit' ,
        'aff_menu'  => true ,
        'modelFilm' => $filmModel,
        'modelArtiste' => $artistesModel,
        'tablerole' =>  $listeRole,
        
        
        ];

        
    echo view('common/HeaderAdmin' , 	$data);
    echo view('Admin/Role/Edit', $data);
    echo view('common/FooterSite');
    }
}    

?>