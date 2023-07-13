<div class="container">
    <h2>Iniciar sesión</h2>
    <?php if(isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="../../controllers/userController.php?action=login" method="POST">
        <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input type="email" class="form-control" id="email" placeholder="Ingresar email" name="email" required>
        </div>
        <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Ingresar contraseña" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </form>
</div>
