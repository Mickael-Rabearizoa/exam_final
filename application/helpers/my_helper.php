<?php

    function getAllCategories(){
        $query = $this->db->query("select * from categorie");
        $categories = array();
        foreach($query->result_array() as $row){
            $categories[] = $row;
        }
        return $categories;
    }

?>