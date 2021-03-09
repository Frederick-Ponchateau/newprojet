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
	public function index()
	{
		$listeRole = $this->roleModel;
        $filmModel = $this->filmModel->findAll();
        $artistesModel= $this->artistesModel;
		$genreModel = $this->genreModel;
		/*********************************************
         * * exemple de passage de variable a une vue
         * * Data view admin artiste 
         *********************************************/ 
        $data = [
            'page_title' => 'Admin > Role Liste' ,
            'aff_menu'  => true ,
            'tablerole' =>	$listeRole,
            'tableFilm' =>  $this->filmModel->orderBy('id','DESC')->paginate(12),
            'tableArtiste' => $artistesModel,
			'tableGenre' => $genreModel,
            'pager' => $this->filmModel->pager,
        ];
		echo view('common/HeaderSite' , 	$data);
		echo view('Site/index.php', $data);
		echo view('common/FooterSite');
	}

}
