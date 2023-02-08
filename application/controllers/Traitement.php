
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

    public function traitement_suppression($idObjet){
        $this->load->model("Fonction_model");
        $this->Fonction_model->supprimer_objet($idObjet);
        redirect("loader/objet_utilisateur");
    }

    public function traitement_modifier(){
        $nomObjet = $_GET["nomObjet"];
        $prix = $_GET["prix_Estimatif"];
        $categorie = $_GET["categorie"];
        $description = $_GET["description"];
        $idObjet = $_GET["idObjet"];
        $this->load->model("Fonction_model");
        $this->Fonction_model->modifier_objet($idObjet , $categorie , $nomObjet , $description , $prix);
        redirect("loader/objet_utilisateur");
    }

    public function proposition_echange($idObjet , $idObjet_a_echanger){
        $this->load->model("Fonction_model");
        $objet_a_echanger = $this->Fonction_model->getObjet_ById($idObjet_a_echanger);
        $objet = $this->Fonction_model->getObjet_ById($idObjet);
        $this->Fonction_model->proposer_echange($objet , $objet_a_echanger);
        redirect("loader/listes_propositions_fait");
    }

    public function accepter_proposition($idProposition){
        $this->load->model("Fonction_model");

        $proposition = $this->Fonction_model->getProposition_ById($idProposition);
        // echo "idObjet1: ".$proposition["idObjet1"]." idObjet2: ".$proposition["idObjet2"]." idUser1: ".$proposition["idUser1"]." idUser2: ".$proposition["idUser2"];
        
        $proprietaire_objet1["idObjet"] = $proposition["idObjet2"];
        $proprietaire_objet1["idProprietaire"] = $proposition["idUser1"];
        $proprietaire_objet2["idObjet"] = $proposition["idObjet1"];
        $proprietaire_objet2["idProprietaire"] = $proposition["idUser2"];
        $this->Fonction_model->changer_etat_proposition($idProposition , "accepte");
        // echo "idObjet1: ".$proposition["idObjet1"]." idObjet2: ".$proposition["idObjet2"]." idUser1: ".$proposition["idUser1"]." idUser2: ".$proposition["idUser2"];
        $this->Fonction_model->insert_echange($proprietaire_objet1 , $proprietaire_objet2);
        $this->Fonction_model->changer_proprietaire($proprietaire_objet1 , $proprietaire_objet2);
        redirect("loader/listes_propositions_recus");
    }

    public function refuser_proposition($idProposition){
        $this->load->model("Fonction_model");
        $this->Fonction_model->changer_etat_proposition($idProposition , "refuse");
        redirect("loader/listes_propositions_recus");
    }

    public function temp(){
        $this->load->model("Fonction_model");
        $this->Fonction_model->getEchange_lastId();
    }

    public function log_out(){
        $this->session->sess_destroy();
        redirect("loader");
    }

    public function traitement_ajout(){
        $nomObjet = $_GET["nom"];
        $prix = $_GET["tarif"];
        $idCategorie = $_GET["categorie"];
        $description = $_GET["description"];
        $user = $_SESSION["user"];
        $this->load->model("Fonction_model");
        $this->Fonction_model->insert_objet($idCategorie , $user["idUser"], $nomObjet , $description , $prix);
        redirect("loader/objet_utilisateur");
    }
}
