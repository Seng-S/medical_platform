<?php
    require_once __DIR__.'/../interfaces/SpecializationManager.php';
    require_once 'AbstractPdoManager.php';

    class PdoSpecializationManager extends AbstractPdoManager implements SpecializationManager {

        public function getSpecializations(){
            $query = self::instance()->prepare('SELECT * FROM specialization');
            $query->execute();
            
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            return $results;
        }

    }

?>