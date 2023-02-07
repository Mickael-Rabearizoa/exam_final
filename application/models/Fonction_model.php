<?php

class Fonction_model extends CI_Model {

    public function getAllUsers(){
        $query = $this->db->query("select * from user");
        $users = array();
        foreach($query->result_array() as $row){
            $users[] = $row;
        }
        return $users;
    }

    public function getAdmin(){
        $query = $this->db->query("select * from admin");
        $admin = $query->row_array();
        return $admin;
    } 

    public function check_login_Admin($login , $mdp){
        $admin = $this->getAdmin();
        $etat = 1;
        // echo "login: ".$login." email: ".$admin["email"];
        if($login == $admin["email"]){
            $etat = 2;
            if($mdp == $admin["mdp"]){
                $etat = 0;
            }
        }
        return $etat;
    }

    public function check_login($login , $mdp){
        $users = $this->getAllUsers();
        $etat = 1;
        foreach($users as $user){
            if($login == $user["email"]){
                $etat = 2;
                if($mdp == $user["mdp"]){
                    $etat = 0;
                }
            }
        }
        return $etat;
    }

    public function getUser_By_Email($email){
        $sql = "select * from user where email = %s ";
        $sql = sprintf($sql , $this->db->escape($email));
        $query = $this->db->query($sql);
        $user = $query->row_array();
        return $user;
    }

    public function inscription($nom , $prenom , $Email , $date_naissance , $mdp){
        $sql = "insert into user values(null, %s , %s , %s , %s , %s)";
        $sql = sprintf($sql , $this->db->escape($nom) , $this->db->escape($prenom) , $this->db->escape($date_naissance) , $this->db->escape($Email) , $this->db->escape($mdp));
        $this->db->query($sql);
        echo $this->db->affected_rows();
    }

    public function getAllCategories(){
        $query = $this->db->query("select * from categorie");
        $categories = array();
        foreach($query->result_array() as $row){
            $categories[] = $row;
        }
        return $categories;
    }

    public function getImage_ById($idImage){
        $sql = "select * from image where idImage = %d";
        $sql = sprintf($sql , $idImage);
        $query = $this->db->query($sql);
        $image = $query->row_array();
        return $image;
    }

    public function ajoutCategorie($categorie){
        $sql = "insert into categorie values(null , %s )";
        $sql = sprintf($sql , $this->db->escape($categorie));
        $this->db->query($sql);
        echo $this->db->affected_rows();
    }


    // non teste
    public function getObjet_By_IdUser($idUser){
        $sql = "select * from objet where idProprietaire = %d ";
        $sql = sprintf($sql , $idUser);
        $query = $this->db->query($sql);
        $objet = array();
        foreach($query->result_array() as $row){
            $objet[] = $row;
        }
        return $objet;
    }

    public function getObjet_filtre($idUser , $idCategorie){
        $sql = "select * from objet where idProprietaire = %d and idCategorie = %d";
        $sql = sprintf($sql , $idUser , $idCategorie);
        $query = $this->db->query($sql);
        $objet = array();
        foreach($query->result_array() as $row){
            $objet[] = $row;
        }
        return $objet;
    }

    public function getObjet_ById($idObjet){
        $sql = "select * from objet where idObjet = %d";
        $sql = sprintf($sql , $idObjet);
        $query = $this->db->query($sql);
        $objet = $query->row_array();
        return $objet;
    }

    public function ajoutObjet($idCategorie , $idProprietaire , $nomObjet , $description , $prix_Estimatif , $idImage){
        $sql  = "insert into objet values(%d , %d , %s , %s , %d , %d)";
        $sql = sprintf($sql , $idCategorie , $idProprietaire , $this->db->escape($nomObjet) , $this->db->escape($description) , $prix_Estimatif , $idImage);
        $this->db->query($sql);
        echo $this->db->affected_rows();
    }

    public function supprimer_objet($idObjet){
        $sql = "delete from objet where idObjet = %d";
        $sql = sprintf($sql , $idObjet);
        $this->db->query($sql);
    }

    public function modifier_objet($idObjet, $idCategorie , $nomObjet , $description , $prix_Estimatif){
        $sql = "update from objet set idCategorie = %d and nomObjet = %s and description = %s and prix_Estimatif = %d where idObjet = %d";
        $sql = sprintf($sql , $idCategorie , $nomObjet , $description , $prix_Estimatif , $idObjet);
        $this->db->query($sql);
    }
}

?>