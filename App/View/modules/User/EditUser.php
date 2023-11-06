<?php include_once VIEWS . 'Header/Header.php';?>

<div class="d-flex justify-content-center">
  <h1>Edição de Usuario</h1>
</div>

<form method="post" action="/user/edit/save">
  <input type="hidden" value="<?=$model->id?>" name="id" />
  <div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="name" id="name" value="<?=$model->name?>" placeholder="Nome">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" id="email" value="<?=$model->email?>" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="setor">Setores</label>
    <div class="d-flex m-1 bd-highlight">
    <?php foreach ($model->setores as $setor): ?>
        <input class="form-check-input" name="setores[]" type="checkbox" value="<?=$setor->id?>" id="checkbox_setor_<?=$setor->id?>" <?=(in_array((int) $setor->id, $model->userSetores, true)) ? 'checked' : ''?> >
        <label class="form-check-label m-2 mt-0" for="checkbox_setor_<?=$setor->id?>"><?=$setor->name?></label>
    <?php endforeach?>
    </div>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<?php include_once VIEWS . 'Footer/Footer.php';?>