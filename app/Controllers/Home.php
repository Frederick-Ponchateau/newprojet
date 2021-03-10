<?php

namespace App\Controllers;

use App\Models\RoleModel;
use App\Models\ArtistesModel;
use App\Models\FilmModel;
use App\Models\GenreModel;
use App\Controllers\BaseController;

class Home extends BaseController
{
	public $roleModel = null;
    public $filmModel = null;
    public $artistesModel = null;
	public $genreModel = null;
    public function __construct(){
        $this->roleModel = new RoleModel();
        $this->filmModel = new FilmModel();
        $this->artistesModel = new ArtistesModel();
		$this->genreModel = new GenreModel();
    }
	public function index($typeSearch=null,$elementSearch=null)
	{
		$searchFilm = $this->filmModel->orderBy('id','DESC')->paginate(12);
		$listeRole = $this->roleModel;
        $filmModel = $this->filmModel->findAll();
        $artistesModel= $this->artistesModel;
		$genreModel = $this->genreModel->findAll();
		
		if(!empty($typeSearch) && !empty($elementSearch)){
			switch($typeSearch){
				
				case "realisateur": 
					$searchFilm = $this->filmModel->where('id_realisateur',$elementSearch)->orderBy('id','DESC')->paginate(12);
				break;
				
				case "genre" : 
					$searchFilm = $this->filmModel->where('genre',$elementSearch)->orderBy('id','DESC')->paginate(12);	
				break;

				case "pays" : 
					$searchFilm = $this->filmModel->where('code_pays',$elementSearch)->orderBy('id','DESC')->paginate(12);
				break;

				case "annee" :
					$searchFilm = $this->filmModel->where('annee',$elementSearch)->orderBy('id','DESC')->paginate(12);
				break;
				
				default;
			}
			
			
		}
		/*********************************************
         * * exemple de passage de variable a une vue
         * * Data view admin artiste 
         *********************************************/ 
        $data = [
            'page_title' => 'Admin > Role Liste' ,
            'aff_menu'  => true ,
            'tablerole' =>	$listeRole,
            'tableFilm' =>  $searchFilm,
            'tableArtiste' => $artistesModel,
			'tableGenre' => $genreModel,
            'pager' => $this->filmModel->pager,
        ];
		echo view('common/HeaderSite' , 	$data);
		echo view('Site/index.php', $data);
		echo view('common/FooterSite');
	}

}
