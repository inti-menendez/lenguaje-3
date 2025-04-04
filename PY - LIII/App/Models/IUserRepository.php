<?php 
    interface IUserRepository {
        public function register(User $user);
        public function edit(User $user);
        public function delete (User $user);
        public function enable(User $user);
        public function disable(User $user);
        public function getAllUsers();
    }
?>