<?php

    class UserController{
        private $userRepository;

        public function __construct(){
            $db = new Connection();
            $this->userRepository = new UserRepository($db);
        }
        
        public function registerUser(){
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["lastName"]) &&
                isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["telephone"]) && 
                isset($_POST["password"]) && isset($_POST["role"])) {
                
                $name = $_POST["name"];
                $lastName = $_POST["lastName"];
                $username = $_POST["username"];
                $email = $_POST["email"];
                $telephone = $_POST["telephone"];
                $password = $_POST["password"];
                $role = $_POST["role"];
                $status = '1';

            } else {
                echo "Faltan datos en el formulario >:(";
            }

            $user = new User(null, $name, $lastName, $username, $email, $telephone, $password, $status, $role);
            
            try {
                if($this->userRepository->register($user)){
                    echo "Usuario registrado correctamente :)";
                    header("Location: index.php?route=users");
                }
            } catch (Exception $exception) {
                echo "Error en el registro :C". $exception->getMessage();
            }
        
        }
        public function showUsers() {
            return $this->userRepository->getAllUsers();
        }    

        public function updateUser(){
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["lastName"]) &&
                        isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["telephone"]) && 
                        isset($_POST["password"]) && isset($_POST["role"])) {

                        $id = $_POST["id"];
                        $name = $_POST["name"];
                        $lastName = $_POST["lastName"];
                        $username = $_POST["username"];
                        $email = $_POST["email"];
                        $telephone = $_POST["telephone"];
                        $password = $_POST["password"];
                        $role = $_POST["role"];
                        $status = isset($_POST["status"]) ? $_POST["status"] : '1';

                        $user = new User($id, $name, $lastName, $username, $email, $telephone, $password, $status, $role);

                        try {
                            if ($this->userRepository->edit($user)) {
                                echo "Usuario actualizado correctamente :)";
                                header("Location: index.php?route=users");
                            }
                        } catch (Exception $exception) {
                            echo "Error al actualizar el usuario :C" . $exception->getMessage();
                        }
                    } else {
                        echo "Faltan datos en el formulario >:(";
                    }
        }
    
    }

?>