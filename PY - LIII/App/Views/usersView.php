<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PY - LPIII</title>
    <link rel="stylesheet" href="Public/Assets/Css/app.css">
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
                            <td><button onclick="window.editUserModal.showModal();"> Editar </button> <button onclick="window.deleteUserModal.showModal();"> Eliminar </button></td>
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
            <h3>¿Seguro que desea eliminar al siguiente usuario: Nombre?</h3>
                <form action="deleteUser" method="post" class="form-users">
                    <button type="submit"> Confirmar </button>
                </form>
            <button type="button" onclick="window.deleteUserModal.close();">Cerrar</button>
        </dialog>

    </main>

</body>
</html>