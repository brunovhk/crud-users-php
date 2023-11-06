<?php include_once VIEWS . 'Header/Header.php';?>
  <div class="d-flex justify-content-center"><h1>Setores</h1></div>
  <div class="d-flex justify-content-end"><a href="/setores/register"><button type="button" class="btn btn-primary ">Cadastrar</button></a></div>
  <hr>
  <table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col" class="text-center">ID</th>
      <th scope="col" class="text-center">Nome</th>
      <th scope="col" class="text-center">Funções</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($model->rows as $user): ?>
    <tr>
      <th scope="row"><a href="/setores/register?id=<?=$user->id?>"><?=$user->id?></a></th>
      <td><?=$user->name?></td>
      <td>
        <div class="d-flex justify-content-end">
          <a href="/setores/register?id=<?=$user->id?>" class="me-2"><button type="button" class="btn btn-primary">Editar</button></a>
          <a href="/setores/delete?id=<?=$user->id?>"><button type="button" class="btn btn-danger">Excluir</button></a>
        </div>
    </td>
    </tr>
    <?php endforeach?>

    <?php if (count($model->rows) == 0): ?>
        <tr>
            <td colspan="4">Nenhum registro encontrado.</td>
        </tr>
    <?php endif?>
  </tbody>
</table>
<?php include_once VIEWS . 'Footer/Footer.php';?>