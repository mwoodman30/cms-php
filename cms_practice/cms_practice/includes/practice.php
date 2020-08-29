<?php

class Practice {
    public function fetch_all() {
        global $pdo;
        
        $query = $pdo->prepare("SELECT * FROM practice");
        $query->execute();
        
        return $query->fetchAll();
    }
    
    public function fetch_data($practice_id) {
        global $pdo;
        
        $query = $pdo->prepare("SELECT * FROM practice WHERE practice_id = ? ");
        $query->bindValue(1, $practice_id);
        
        $query->execute();
        return $query->fetch();
    }
}

?>