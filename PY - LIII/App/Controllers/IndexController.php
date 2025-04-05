<?php
    class IndexController {
        public function route() {
            $route = isset($_GET['route']) ? trim($_GET['route'], '/') : 'login';

            $routes = [
                'login' => 'App/Views/loginView.php',
                'authLogin' => 'App/Controllers/authLoginController.php',
                'main' => 'App/Views/mainView.php',
                'users' => 'users',
                'registerUser' => 'App/Controllers/registerUserController.php',
                'editUser' => 'App/Controllers/EditUserController.php',
                'deleteUser' => 'App/Controllers/deleteUserController.php'
            ];

            if (array_key_exists($route, $routes)) {
                if ($route === 'users') {

                    $roleController = new RoleController();
                    $roles = $roleController->showRoles(); 

                    $userController = new UserController();
                    $users = $userController->showUsers(); 
                    
                    require_once 'App/Views/usersView.php';

                } else {
                    
                    require_once $routes[$route];
                }
            } else {
                echo "Página no encontrada";
            }
        }
    }
?>