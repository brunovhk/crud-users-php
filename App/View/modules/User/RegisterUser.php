<?php include_once VIEWS . 'Header/Header.php';?>

<div class="d-flex justify-content-center">
  <h1>Cadastro de Usuario</h1>
</div>

<form method="post" action="/user/register/save">
  <div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Nome">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<?php include_once VIEWS . 'Footer/Footer.php';?>