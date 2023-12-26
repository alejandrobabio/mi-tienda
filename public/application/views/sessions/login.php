<div class="container zoom-80">
  <h2>Login</h2>

  <?= $this->session->flashdata('error'); ?>
  <?php echo validation_errors(); ?>

  <form action="/sessions/login" method="post" accept-charset="utf-8">
      <label for="username">Usuario</label>
      <input type="text" name="username" /><br />

      <label for="password">Contraseña</label>
      <input type="password" name="password"></input><br />

      <input type="submit" name="submit" value="Ingresar"/>
  </form>
</div>
