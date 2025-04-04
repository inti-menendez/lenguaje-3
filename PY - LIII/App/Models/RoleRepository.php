<?php 

    class RoleRepository{
        private $db;

        public function __construct(Connection $db){
            $this->db = $db->getConnection();
        }

        public function getAllRoles(){
            try {
                $query = "SELECT * FROM roles";
                $preparation = $this->db->prepare($query);
                $preparation->execute();
                return $preparation->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $exception) {
                die("Error: " . $exception->getMessage());
            }
        }
    }


?>