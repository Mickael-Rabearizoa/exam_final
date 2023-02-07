
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Traitement extends CI_Controller {

    public function index(){
        $this->load->view("welcome_message");
    }

	public function traitement_login(){
        $login = $_POST["email"];
        $mdp = $_POST["mdp"];
        $this->load->model("Fonction_model");
        $etat = $this->Fonction_model->check_login($login , $mdp);
        if($etat == 0){
            $user = $this->Fonction_model->getUser_By_Email($login);
            $this->session->set_userdata("user",$user);
            redirect("loader/objet_utilisateur");
        }else{
            // mbola corrigena
            redirect("loader/erreur_login/".$etat);
        }
	}		

    public function traitement_login_admin(){
        $login = $_POST["email"];
        $mdp = $_POST["mdp"];
        $this->load->model("Fonction_model");
        $etat = $this->Fonction_model->check_login_Admin($login , $mdp);
        // echo "login: ".$login." mdp: ".$mdp;
        if($etat == 0){
            redirect("loader/gestion_categorie");
        }else{
            redirect("loader/erreur_login_admin/".$etat);
        }
	}	

    public function inscription(){
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $date_naissance = $_POST["date_naissance"];
        $mdp = $_POST["mdp"];
        $this->load->model("Fonction_model");
        $this->Fonction_model->inscription($nom , $prenom , $email , $date_naissance , $mdp);
        redirect("loader/objet_utilisateur");
    }

    public function ajout_categorie(){
        $categorie = $_GET["categorie"];
        $this->load->model("Fonction_model");
        $this->Fonction_model->ajoutCategorie($categorie);
        redirect("loader/gestion_categorie");
    }

    
    public function temp(){
        $this->load->model("Fonction_model");
        $this->Fonction_model->ajoutCategorie("sport");
    }
}
