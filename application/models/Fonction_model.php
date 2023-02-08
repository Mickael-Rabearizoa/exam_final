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

    public function getUser_ById($idUser){
        $sql = "select * from user where idUser = %d ";
        $sql = sprintf($sql , $idUser);
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

    public function getOther_users($idUser){
        $sql = "select * from user where idUser != %d";
        $sql = sprintf($sql , $idUser);
        $query = $this->db->query($sql);
        $users = array();
        foreach($query->result_array() as $row){
            $users[] = $row;
        }
        return $users;
    }

    public function getImage_ById($idImage){
        $sql = "select * from image where idImage = %d";
        $sql = sprintf($sql , $idImage);
        $query = $this->db->query($sql);
        $image = $query->row_array();
        return $image;
    }

    public function getImage_objet($idObjet){
        $sql = "select * from image_objet where idObjet = %d";
        $sql = sprintf($sql , $idObjet);
        $query = $this->db->query($sql);
        $image_objet = array();
        foreach($query->result_array() as $temp){
            $image_objet[] = $temp;
        }
        return $image_objet;
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

    public function getObjet_Other_users($idUser , $idCategorie){
        $sql = "select * from objet where idProprietaire != %d and idCategorie = %d";
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


    public function insert_proposition($idObjet , $idObjet_a_echanger , $idUser_objet , $idUser_objet_a_echanger){
        // echo "id1: ".$idUser_objet." id2: ".$idUser_objet_a_echanger;
        $sql = "insert into proposition values(null , %d , %d , %d , %d , 'attente')";
        $sql = sprintf($sql , $idObjet , $idObjet_a_echanger , $idUser_objet , $idUser_objet_a_echanger);
        // echo $sql;
        $this->db->query($sql);
    }

    public function proposer_echange($objet , $objet_a_echanger){
        $user_objet = $this->getUser_ById($objet["idProprietaire"]);
        $user_objet_a_echanger = $this->getUser_ById($objet_a_echanger["idProprietaire"]);
        // echo $objet_a_echanger["idProprietaire"];
        $this->insert_proposition($objet["idProprietaire"] , $objet_a_echanger["idProprietaire"] , $user_objet["idUser"] , $user_objet_a_echanger["idUser"]);
    }

    public function getProposition_user($idUser){
        $sql = "select * from proposition where idUser1 = %d and etat = 'attente'";
        $sql = sprintf($sql , $idUser);
        $query = $this->db->query($sql);
        $proposition = array();
        foreach($query->result_array() as $row){
            $proposition[] = $row;
        }
        return $proposition;
    }

    public function getProposition_recu($idUser){
        $sql = "select * from proposition where idUser2 = %d and etat = 'attente'";
        $sql = sprintf($sql , $idUser);
        $query = $this->db->query($sql);
        $proposition = array();
        foreach($query->result_array() as $row){
            $proposition[] = $row;
        }
        return $proposition;
    }
    public function changer_etat_proposition($idProposition , $etat){
        $sql = "update proposition set etat = %s where idProposition = %d ";
        $sql = sprintf($sql , $this->db->escape($etat) , $idProposition);
        $this->db->query($sql);
    }

    public function getProposition_ById($idProposition){
        $sql = "select * from proposition where idProposition = %d ";
        $sql = sprintf($sql , $idProposition);
        $query = $this->db->query($sql);
        $proposition = $query->row_array();
        // echo "idObjet1: ".$proposition["idObjet1"]." idObjet2: ".$proposition["idObjet2"]." idUser1: ".$proposition["idUser1"]." idUser2: ".$proposition["idUser2"];
        return $proposition;
    }

    public function changer_proprietaire($proprietaire_objet1 , $proprietaire_objet2){
        $format = "update objet set idProprietaire = %d where idObjet = %d ";
        $sql1 = sprintf($format , $proprietaire_objet1["idProprietaire"] , $proprietaire_objet1["idObjet"]);
        $sql2 = sprintf($format , $proprietaire_objet2["idProprietaire"] , $proprietaire_objet2["idObjet"]);
        $this->db->query($sql1);
        $this->db->query($sql2);
    }

    public function getEchange_lastId(){
        $sql = "select max(idEchange) as last_id from echange";
        $query = $this->db->query($sql);
        $last_id = $query->row_array();
        $result = 1;
        if($last_id["last_id"] == null){
            $result = 1;
        } else {
            $result = $last_id["last_id"];
        }
        return $result;
    }

    public function insert_echange($proprietaire_objet1 , $proprietaire_objet2){
        $idEchange = $this->getEchange_lastId();
        $idEchange = $idEchange+1;
        $format = "insert into echange values(%d , now() , %d , %d)";
        $sql1 = sprintf($format , $idEchange , $proprietaire_objet1["idObjet"] , $proprietaire_objet1["idProprietaire"]);
        $sql2 = sprintf($format , $idEchange , $proprietaire_objet2["idObjet"] , $proprietaire_objet2["idProprietaire"]);
        $this->db->query($sql1);
        $this->db->query($sql2);
    }

    public function modifier_objet($idObjet, $idCategorie , $nomObjet , $description , $prix_Estimatif){
        $sql = "update objet set idCategorie = %d , nomObjet = %s , description = %s , prix_Estimatif = %d where idObjet = %d";
        $sql = sprintf($sql , $idCategorie , $this->db->escape($nomObjet) , $this->db->escape($description) , $prix_Estimatif , $idObjet);
        $this->db->query($sql);
    }

    public function insert_objet( $idCategorie , $idUser , $nomObjet , $description , $prix_Estimatif){
        $sql = "insert into objet values(null , %d , %d , %s , %s , %d)";
        $sql = sprintf($sql , $idCategorie , $idUser , $this->db->escape($nomObjet) , $this->db->escape($description) , $prix_Estimatif );
        $this->db->query($sql);
    }

}

?>