<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loader extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}	
    
    public function gestion_categorie(){
        $this->load->model("Fonction_model");
        $categorie = $this->Fonction_model->getAllCategories();
        for($i=0; $i<count($categorie) ;$i++){
            $image =  $this->Fonction_model->getImage_ById($categorie[$i]["idImage"]);
            $categorie[$i]["pathImage"] = $image["path"];
        }
        $data["categories"] = $categorie;
        $this->load->view("gestion_categorie" , $data);
    }

    public function objet_utilisateur(){
        $user = $_SESSION["user"];
        $this->load->model("Fonction_model");
        $objet = $this->Fonction_model->getObjet_By_IdUser($user["idUser"]);
        for($i=0; $i<count($objet) ;$i++){
            $image = $this->Fonction_model->getImage_ById($objet[$i]["idImage"]);
            $objet[$i]["pathImage"] = $image["path"];
        }
        $liste_objet["objet"] = $objet;
        
        $this->load->view("objet_utilisateur" , $liste_objet);
    }

    public function erreur_login($erreur){
        $error["erreur"] = $erreur;
        $this->load->view("index" , $error);
    }

    public function erreur_login_admin($erreur){
        $error["erreur"] = $erreur;
        $this->load->view("admin" , $error);
    }

    public function register(){
        $this->load->view('register');
    }

    public function admin(){
        $this->load->view('admin');
    }

    public function apercu($idObjet){
        $this->load->model("Fonction_model");
        $objet = $this->Fonction_model->getObjet_ById($idObjet);
        $obj["objet"] = $objet;
        $this->load->view('apercu' , $obj);
    }

    // public function objet_utilisateur(){
    //     $this->load->view("objet_utilisateur");
    // }

    
}
