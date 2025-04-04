<?php

    class UserRepository implements IUserRepository {
        private $db;

        public function __construct(Connection $db){
            $this->db = $db->getConnection();
        }

        public function register(User $user) {
           try {
            $name = $user->getName();
            $lastName = $user->getLastName();
            $username = $user->getUsername();
            $email = $user->getEmail();
            $telephone = $user->getTelephone();
            $password = password_hash($user->getPassword(), PASSWORD_BCRYPT);
            $status = $user->getStatus();
            $role = $user->getRole();

            $query = "INSERT INTO users (name, last_name, username, email, telephone, password, status, role_id) 
            VALUES (:name, :last_name, :username, :email, :telephone, :password, :status, :role_id)";
  
            $preparation = $this->db->prepare($query);
            $preparation->bindParam(":name", $name);
            $preparation->bindParam(":last_name", $lastName);
            $preparation->bindParam(":username", $username);
            $preparation->bindParam(":email", $email);
            $preparation->bindParam(":telephone", $telephone);
            $preparation->bindParam(":password", $password);
            $preparation->bindParam(":status", $status);
            $preparation->bindParam(":role_id", $role);

            return $preparation->execute();

           } catch (PDOException $exception) {
                echo "Ha ocurrido un error en el registro." . $exception->getMessage();
           }

        }

        public function edit(User $user){
            
            
        }

        public function delete(User $user){
            
        }

        public function enable(User $user) {
            
        }

        public function disable(User $user) {
            
        }

        public function getAllUsers(){
            try {
                $query = "SELECT * FROM users";
                $preparation = $this->db->prepare($query);
                $preparation->execute();
                return $preparation->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $exception) {
                die("Error: " . $exception->getMessage());
            }
        }
        
    }

?>