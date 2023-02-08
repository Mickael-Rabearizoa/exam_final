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
        $this->load->view("footer.html");
    }

    public function objet_utilisateur(){
        $user = $_SESSION["user"];
        $this->load->model("Fonction_model");
        $objet = $this->Fonction_model->getObjet_By_IdUser($user["idUser"]);
        for($i=0; $i<count($objet) ;$i++){
            $image_objet = $this->Fonction_model->getImage_objet($objet[$i]["idObjet"]);
            if($image_objet != null){
                $image = $this->Fonction_model->getImage_ById($image_objet[0]["idImage"]);
                $objet[$i]["pathImage"] = $image["path"];
            } else {
                $objet[$i]["pathImage"] = "assets/images/default.png";   
            }
        }
        $categories = $this->Fonction_model->getAllCategories();
        $data["objet"] = $objet;
        $data["categories"] = $categories;
        $this->load->view("objet_utilisateur" , $data);
        $this->load->view("footer.html");
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

    public function filtre($idCategorie , $page){
        $this->load->model("Fonction_model");
        $user = $_SESSION["user"];
        $objet = $this->Fonction_model->getObjet_filtre($user["idUser"] , $idCategorie);
        for($i=0; $i<count($objet) ;$i++){
            $image_objet = $this->Fonction_model->getImage_objet($objet[$i]["idObjet"]);
            if($image_objet != null){
                $image = $this->Fonction_model->getImage_ById($image_objet[0]["idImage"]);
                $objet[$i]["pathImage"] = $image["path"];
            } else {
                $objet[$i]["pathImage"] = "assets/images/default.png";   
            }
        }
        $categories = $this->Fonction_model->getAllCategories();
        $data["objet"] = $objet;
        $data["categories"] = $categories;
        $data["idUser"] = $user["idUser"];
        $this->load->view($page , $data);
        $this->load->view("footer.html");
    }

    public function filtre_echange($idCategorie , $page , $idObjet_a_echanger){
        $this->load->model("Fonction_model");   
        $objet_a_echanger = $this->Fonction_model->getObjet_ById($idObjet_a_echanger);
        $image_objet = $this->Fonction_model->getImage_objet($objet_a_echanger["idObjet"]);
        if($image_objet != null){
            $image = $this->Fonction_model->getImage_ById($image_objet[0]["idImage"]);
            $objet_a_echanger["pathImage"] = $image["path"];
        } else {
            $objet_a_echanger["pathImage"] = "assets/images/default.png";
        }
        

        $user = $_SESSION["user"];
        $objet = $this->Fonction_model->getObjet_filtre($user["idUser"] , $idCategorie);
        for($i=0; $i<count($objet) ;$i++){
            $image_objet = $this->Fonction_model->getImage_objet($objet[$i]["idObjet"]);
            if($image_objet != null){
                $image = $this->Fonction_model->getImage_ById($image_objet[0]["idImage"]);
                $objet[$i]["pathImage"] = $image["path"];
            } else {
                $objet["pathImage"] = "assets/images/default.png";
            }
            
        }
        $categories = $this->Fonction_model->getAllCategories();
        $data["objet"] = $objet;
        $data["categories"] = $categories;
        $data["idUser"] = $user["idUser"];
        $data["objet_a_echanger"] = $objet_a_echanger;
        $this->load->view($page , $data);
        $this->load->view("footer.html");
    }

    public function filtre_autre($idCategorie , $page , $idUser){
        $this->load->model("Fonction_model");
        $objet = $this->Fonction_model->getObjet_filtre($idUser , $idCategorie);
        for($i=0; $i<count($objet) ;$i++){
            $image_objet = $this->Fonction_model->getImage_objet($objet[$i]["idObjet"]);
            if($image_objet != null){
                $image = $this->Fonction_model->getImage_ById($image_objet[0]["idImage"]);
                $objet[$i]["pathImage"] = $image["path"];
            } else {
                $objet["pathImage"] = "assets/images/default.png";
            }
        }
        $categories = $this->Fonction_model->getAllCategories();
        $data["objet"] = $objet;
        $data["categories"] = $categories;
        $data["idUser"] = $idUser;
        $this->load->view($page , $data);
        $this->load->view("footer.html");
    }

    public function filtre_object_other_users($idCategorie){
        $this->load->model("Fonction_model");
        $user = $_SESSION["user"];
        $objet = $this->Fonction_model->getObjet_Other_users($user["idUser"] , $idCategorie);
        for($i=0; $i<count($objet) ;$i++){
            $image_objet = $this->Fonction_model->getImage_objet($objet[$i]["idObjet"]);
            if($image_objet != null){
                $image = $this->Fonction_model->getImage_ById($image_objet[0]["idImage"]);
                $objet[$i]["pathImage"] = $image["path"];
            } else {
                $objet["pathImage"] = "assets/images/default.png";
            }
        }
        $categories = $this->Fonction_model->getAllCategories();
        $data["objet"] = $objet;
        $data["categories"] = $categories;
        $this->load->view($page , "listes_objets_autres");
        $this->load->view("footer.html");
    }

    public function apercu($idObjet){
        $this->load->model("Fonction_model");
        $objet = $this->Fonction_model->getObjet_ById($idObjet);
        $image_objet = $this->Fonction_model->getImage_objet($idObjet);
        $image = array();
        foreach($image_objet as $temp){
            $image[] = $this->Fonction_model->getImage_ById($temp["idImage"]);
        }
        if($image_objet == null){
            $image[]["path"] =  "assets/images/default.png";
        }

        $categories = $this->Fonction_model->getAllCategories();
        $objet["images"] = $image;
        $obj["categories"] = $categories;
        $obj["objet"] = $objet;
        $this->load->view('apercu' , $obj);
        $this->load->view("footer.html");
    }

    public function apercu_autre($idObjet , $idUser){
        $this->load->model("Fonction_model");
        $objet = $this->Fonction_model->getObjet_ById($idObjet);
        $image_objet = $this->Fonction_model->getImage_objet($idObjet);
        $image = array();
        foreach($image_objet as $temp){
            $image[] = $this->Fonction_model->getImage_ById($temp["idImage"]);
        }
        if($image_objet == null){
            $image[]["path"] =  "assets/images/default.png";
        }
        $categories = $this->Fonction_model->getAllCategories();
        $objet["images"] = $image;
        $obj["categories"] = $categories;
        $obj["objet"] = $objet;
        $obj["idUser"] = $idUser; 
        $this->load->view('apercu_autre' , $obj);
        $this->load->view("footer.html");
    }

    public function modif_objet($idObjet){
        $this->load->model("Fonction_model");
        $objet = $this->Fonction_model->getObjet_ById($idObjet);
        $categories = $this->Fonction_model->getAllCategories();
        $data["objet"] = $objet;
        $data["categories"] = $categories;
        $this->load->view("modif_objet" , $data);
        $this->load->view("footer.html");
    }

    public function listes_utilisateurs(){
        $user = $_SESSION["user"];
        $this->load->model("Fonction_model");
        $categories = $this->Fonction_model->getAllCategories();
        $users = $this->Fonction_model->getOther_users($user["idUser"]);
        $data["categories"] = $categories;
        $data["users"] = $users;
        $this->load->view("listes_utilisateurs" , $data);
        $this->load->view("footer.html");
    }

    public function listes_objets_autres($idUser){
        $this->load->model("Fonction_model");
        $objet = $this->Fonction_model->getObjet_By_IdUser($idUser);
        for($i=0; $i<count($objet) ;$i++){
            $image_objet = $this->Fonction_model->getImage_objet($objet[$i]["idObjet"]);
            if($image_objet != null){
                $image = $this->Fonction_model->getImage_ById($image_objet[0]["idImage"]);
                $objet[$i]["pathImage"] = $image["path"];
            } else {
                $objet["pathImage"] = "assets/images/default.png";
            }
        }
        $categories = $this->Fonction_model->getAllCategories();
        $data["objet"] = $objet;
        $data["categories"] = $categories;
        $data["idUser"] = $idUser;
        $this->load->view("listes_objets_autres" , $data);
        $this->load->view("footer.html");
    }

    public function listes_objets_a_echanger($idObjet_a_echanger){
        $user = $_SESSION["user"];
        $this->load->model("Fonction_model");
        $objet = $this->Fonction_model->getObjet_By_IdUser($user["idUser"]);
        $objet_a_echanger = $this->Fonction_model->getObjet_ById($idObjet_a_echanger);
        $image_objet = $this->Fonction_model->getImage_objet($objet_a_echanger["idObjet"]);
        // ////////////////////////////
        if($image_objet != null){
            $image = $this->Fonction_model->getImage_ById($image_objet[0]["idImage"]);
            $objet_a_echanger["pathImage"] = $image["path"];
        } else {
            $objet_a_echanger["pathImage"] = "assets/images/default.png";
        }
        
        for($i=0; $i<count($objet) ;$i++){
            $image_objet = $this->Fonction_model->getImage_objet($objet[$i]["idObjet"]);
            if($image_objet != null){
                $image = $this->Fonction_model->getImage_ById($image_objet[0]["idImage"]);
                $objet[$i]["pathImage"] = $image["path"];
            } else {
                $objet["pathImage"] = "assets/images/default.png";
            }
        }
        $categories = $this->Fonction_model->getAllCategories();
        $data["objet"] = $objet;
        $data["categories"] = $categories;
        $data["objet_a_echanger"] = $objet_a_echanger;
        $this->load->view("listes_objets_a_echanger" , $data);
        $this->load->view("footer.html");
    }

    public function apercu_echange($idObjet , $idObjet_a_echanger){
        $this->load->model("Fonction_model");
        $objet_a_echanger = $this->Fonction_model->getObjet_ById($idObjet_a_echanger);
        $image_objet = $this->Fonction_model->getImage_objet($objet_a_echanger["idObjet"]);
        // //////////////////////////////////////
        if($image_objet != null){
            $image = $this->Fonction_model->getImage_ById($image_objet[0]["idImage"]);
            $objet_a_echanger["pathImage"] = $image["path"];
        } else {
            $objet_a_echanger["pathImage"] = "assets/images/default.png";
        }

        
        $objet = $this->Fonction_model->getObjet_ById($idObjet);
        $image_objet = $this->Fonction_model->getImage_objet($idObjet);
        $image = array();
        // //////////////////////////////////
        foreach($image_objet as $temp){
            $image[] = $this->Fonction_model->getImage_ById($temp["idImage"]);
        }
        if($image_objet != null){
            $image[]["pathImage"] = "assets/images/default.png";
        }
        $categories = $this->Fonction_model->getAllCategories();
        $objet["images"] = $image;
        $obj["categories"] = $categories;
        $obj["objet"] = $objet;
        $obj["objet_a_echanger"] = $objet_a_echanger;
        $this->load->view('apercu_echange' , $obj);
        $this->load->view("footer.html");
    }

    public function listes_propositions_fait(){
        $user = $_SESSION["user"];
        $this->load->model("Fonction_model");
        $propositions = $this->Fonction_model->getProposition_user($user["idUser"]);
        for($i=0; $i<count($propositions) ;$i++){
            $user2 = $this->Fonction_model->getUser_ById($propositions[$i]["idUser2"]);
            $objet = $this->Fonction_model->getObjet_ById($propositions[$i]["idObjet1"]);
            $objet_a_echanger = $this->Fonction_model->getObjet_ById($propositions[$i]["idObjet2"]);
            $propositions[$i]["user2"] = $user2;
            $propositions[$i]["objet1"] = $objet;
            $propositions[$i]["objet2"] = $objet_a_echanger;

            $image_objet = $this->Fonction_model->getImage_objet($objet["idObjet"]);
            // ////////////////
            if($image_objet != null){
                $image = $this->Fonction_model->getImage_ById($image_objet[0]["idImage"]);
                $propositions[$i]["pathImage1"] = $image["path"];
            } else {
                $propositions[$i]["pathImage1"] = "assets/images/default.png";
            }
            

            $image_objet = $this->Fonction_model->getImage_objet($objet_a_echanger["idObjet"]);
            // //////////////////
            if($image_objet != null){
                $image = $this->Fonction_model->getImage_ById($image_objet[0]["idImage"]);
                $propositions[$i]["pathImage2"] = $image["path"];
            } else {
                $propositions[$i]["pathImage2"] = "assets/images/default.png";
            }
            
        }
        $categories = $this->Fonction_model->getAllCategories();
        $data["propositions"] = $propositions;
        $data["categories"] = $categories;
        $this->load->view("listes_propositions_fait" , $data);
        $this->load->view("footer.html");
    }

    public function listes_propositions_recus(){
        $user = $_SESSION["user"];
        $this->load->model("Fonction_model");
        $propositions = $this->Fonction_model->getProposition_recu($user["idUser"]);
        for($i=0; $i<count($propositions) ;$i++){
            $user1 = $this->Fonction_model->getUser_ById($propositions[$i]["idUser1"]);
            $objet = $this->Fonction_model->getObjet_ById($propositions[$i]["idObjet1"]);
            $objet_a_echanger = $this->Fonction_model->getObjet_ById($propositions[$i]["idObjet2"]);
            $propositions[$i]["user1"] = $user1;
            $propositions[$i]["objet1"] = $objet;
            $propositions[$i]["objet2"] = $objet_a_echanger;
// ///////////////////////////////
            $image_objet = $this->Fonction_model->getImage_objet($objet["idObjet"]);
            if($image_objet != null){
                $image = $this->Fonction_model->getImage_ById($image_objet[0]["idImage"]);
                $propositions[$i]["pathImage1"] = $image["path"];
            } else {
                $propositions[$i]["pathImage1"] = "assets/images/default.png";
            }
            
            
// /////////////
            $image_objet = $this->Fonction_model->getImage_objet($objet_a_echanger["idObjet"]);
            if($image_objet != null){
                $image = $this->Fonction_model->getImage_ById($image_objet[0]["idImage"]);
                $propositions[$i]["pathImage2"] = $image["path"];
            } else {
                $propositions[$i]["pathImage2"] = "assets/images/default.png";
            }
            
        }
        $categories = $this->Fonction_model->getAllCategories();
        $data["propositions"] = $propositions;
        $data["categories"] = $categories;
        $this->load->view("listes_propositions" , $data);
        $this->load->view("footer.html");
    }

    public function ajout_objet(){
        $this->load->model("Fonction_model");
        $categories = $this->Fonction_model->getAllCategories();
        $data["categories"] = $categories;
        $this->load->view("ajout_objet" , $data);
    }

    // public function objet_utilisateur(){
    //     $this->load->view("objet_utilisateur");
    // }

    
}
