<?php include_once VIEWS . 'Header/Header.php';?>

<div class="d-flex justify-content-center"><h1>Cadastro de Setores</h1></div>

<form method="post" action="/setores/register/save">
    <input type="hidden" value="<?=$model->id?>" name="id"/>
  <div class="form-group">
    <label for="name">Nome do Setor</label>
    <input type="text" class="form-control" name="name" id="name" value="<?=$model->name?>"  placeholder="Nome">
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<?php include_once VIEWS . 'Footer/Footer.php';?>