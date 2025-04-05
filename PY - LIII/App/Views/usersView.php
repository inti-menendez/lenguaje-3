<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PY - LPIII</title>
    <link rel="stylesheet" href="Public/Assets/Css/app.css">
    <script>
    function fillEditForm(button) {
        const modal = document.getElementById('editUserModal');
        modal.querySelector('input[name="id"]').value = button.dataset.id;
        modal.querySelector('input[name="name"]').value = button.dataset.name;
        modal.querySelector('input[name="lastName"]').value = button.dataset.lastname;
        modal.querySelector('input[name="username"]').value = button.dataset.username;
        modal.querySelector('input[name="email"]').value = button.dataset.email;
        modal.querySelector('input[name="telephone"]').value = button.dataset.telephone;
        modal.querySelector('select[name="role"]').value = button.dataset.role;
    }

    function fillDeleteForm(button) {
        const deleteModal = document.getElementById('deleteUserModal');
        deleteModal.querySelector('input[name="id"]').value = button.dataset.id;
    }
</script>
</head>
<body class="main-body">
    <?php require_once __DIR__ . '../Partials/aside.php'; ?>
    <main class="main-container">
        <h1>LPIII / Usuarios </h1>
        <button onclick="window.registerUserModal.showModal();">Registar usuario</button>

        <section>
        <table id="tableUsers">
            <thead> 
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['last_name'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['telephone'] ?></td>
                            <td><?php if($user['role_id'] == 1){ echo "Administrador"; } else {echo "Usuario";} ?></td>
                            <td><button> <?php // insertar ternaria chulita ?> Habilitado </button></td>
                            <td>
                                <button data-id="<?= $user['id'] ?>" 
                                        data-name="<?= $user['name'] ?>" 
                                        data-lastname="<?= $user['last_name'] ?>" 
                                        data-username="<?= $user['username'] ?>" 
                                        data-email="<?= $user['email'] ?>" 
                                        data-telephone="<?= $user['telephone'] ?>" 
                                        data-role="<?= $user['role_id'] ?>" 
                                        onclick="window.editUserModal.showModal();fillEditForm(this); ">
                                    Editar
                                </button>

                                      
                            <button onclick="window.deleteUserModal.showModal(); fillDeleteForm(this)" data-id=<?=$user['id']?>> Eliminar </button></td>
                            
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="8">Aun no hay usuarios registrados.</td></tr>
                <?php endif; ?>
            </tbody>
            <tfoot></tfoot>
        </table>

        </section>

        <dialog name="registerUserModal" id="registerUserModal" closedby="any">
            <h3>Registro de usuarios</h3>
            <form action="registerUser" method="post" class="form-users">
                
                <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name">
                <label for="lastName">Apellido:</label>
                    <input type="text" name="lastName" id="lastName">
                <label for="username">Usuario:</label>
                    <input type="text" name="username" id="username">
                <label for="email">Correo:</label>
                    <input type="email" name="email" id="email">
                <label for="telephone">Télefono:</label>
                    <input type="tel" name="telephone" id="telephone">
                <label for="password">Contraseña:</label>
                    <input type="password" name="password" id="password">
                <label for="role">Rol:</label>
                    <select name="role" id="role">
                    <option value="disable">Seleccione...</option>
                    <?php if(!empty($roles)): ?>
                        <?php foreach ($roles as $role): ?>
                        <option value="<?= $role['id']; ?>"> <?= $role['description']; ?></option>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </select> <br>
                <button type="submit"> Registrar </button>
            </form>
        <button type="button" onclick="window.registerUserModal.close();">Cerrar</button>
        </dialog>

        <dialog name="editUserModal" id="editUserModal" closedby="any">
            <h3>Edición de usuarios</h3>
            <form action="editUser" method="post" class="form-users">
            <input type="hidden" name="id" id="id">
                <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name">
                <label for="lastName">Apellido:</label>
                    <input type="text" name="lastName" id="lastName">
                <label for="username">Usuario:</label>
                    <input type="text" name="username" id="username">
                <label for="email">Correo:</label>
                    <input type="email" name="email" id="email">
                <label for="telephone">Télefono:</label>
                    <input type="tel" name="telephone" id="telephone">
                <label for="password">Contraseña:</label>
                    <input type="password" name="password" id="password">
                <label for="role">Rol:</label>
                    <select name="role" id="role">
                    <option value="disable">Seleccione...</option>
                    <?php if(!empty($roles)): ?>
                        <?php foreach ($roles as $role): ?>
                        <option value="<?= $role['id']; ?>"> <?= $role['description']; ?></option>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </select> <br>
                    <button type="submit"> Confirmar </button>
                </form>
            <button type="button" onclick="window.editUserModal.close();">Cerrar</button>
        </dialog>

        <dialog name="deleteUserModal" id="deleteUserModal" closedby="any">
            <h3>¿Seguro que desea eliminar este usuario?</h3>
                <form action="deleteUser" method="post" class="form-users">
                    <input type="text" name=id>
                    <button type="submit"> Confirmar </button>
                </form>
            <button type="button" onclick="window.deleteUserModal.close();">Cerrar</button>
        </dialog>

    </main>

</body>
</html>

