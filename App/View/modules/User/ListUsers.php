<?php include_once VIEWS . 'Header/Header.php'; ?>
<div class="d-flex justify-content-center">
  <h1>Usuários</h1>
</div>
<div class="d-flex justify-content-end"><a href="/user/register"><button type="button" class="btn btn-primary ">Cadastrar</button></a></div>
<hr>
<select class="form-select" id="setor">
  <option value="" selected>SELECIONE UM SETOR</option>
  <?php foreach ($model->setores as $setor) : ?>
    <option value="<?= $setor->id ?>"><?= $setor->name ?></option>
  <?php endforeach ?>
</select>
<button type="submit" class="btn btn-primary" id="filter">Filtrar</button>
<hr>
<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col" class="text-center">ID</th>
      <th scope="col" class="text-center">Nome</th>
      <th scope="col" class="text-center">Email</th>
      <th scope="col" class="text-center">Setor</th>
      <th scope="col" class="text-center">Funções</th>
    </tr>
  </thead>
  <tbody id="table-body">
    <?php foreach ($model->rows as $user) : ?>
      <tr>
        <th scope="row"><?= $user->id ?></th>
        <td><?= $user->name ?></td>
        <td><?= $user->email ?></td>
        <td><?= $user->name ?></td>
        <td>
          <div class="d-flex justify-content-end">
            <a href="/user/edit?id=<?= $user->id ?>" class="me-2"><button type="button" class="btn btn-primary">Editar</button></a>
            <a href="/user/delete?id=<?= $user->id ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
          </div>
        </td>
      </tr>
    <?php endforeach ?>

    <?php if (count($model->rows) == 0) : ?>
      <tr>
        <td colspan="4">Nenhum registro encontrado.</td>
      </tr>
    <?php endif ?>
  </tbody>
</table>
<script type="text/javascript">
  var tableBody = $("#table-body")
  $('#filter').click(function(e) {
    e.preventDefault()
    $.ajax({
      type: "GET",
      url: "/user/setores/search",
      data: {
        id: $('#setor').val()
      },
      dataType: 'JSON',
      success: function(response) {
        $("tbody > tr").html("")
        $.each(response.filter_setores, function(index, item) {

          var tr = $("<tr>");
          tr.append($("<td>").text(item.user_id));
          tr.append($("<td>").text(item.user_name));
          tr.append($("<td>").text(item.user_email));
          tr.append($("<td>").text(item.setor_name));
          tr.append(`<a href="/user/edit?id=${item.user_id}" class="me-2"><button type="button" class="btn btn-primary">Editar</button></a>`)
          tr.append(`<a href="/user/delete?id=${item.user_id}"><button type="button" class="btn btn-danger">Excluir</button></a>`)
          tableBody.append(tr);
        });
      },
      error: function() {
        alert("Erro ao buscar os dados.");
      }
    });
  });
</script>
<?php include_once VIEWS . 'Footer/Footer.php'; ?>