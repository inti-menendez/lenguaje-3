<?php

    class RoleController{
        private $roleRepository;

        public function __construct(){
            $db = new Connection;
            $this->roleRepository = new RoleRepository($db);
        }
        
        public function showRoles() {
            return $this->roleRepository->getAllRoles();
        }    
    
    }

?>