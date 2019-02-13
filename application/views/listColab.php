<div class="container">

  <h1>Colaboradores cadastrados</h1>
  <table class="table">
    <thead class="border">
      <tr >
        <th class="col" scope="col"><h3>Nome</h3></th>
        <th class="col" scope="col"><h3>Email</h3></th>
        <th class="col" scope="col"><h3>CPF</h3></th>
        <th class="col" scope="col"><h3>Sexo</h3></th>
      </tr>
    </thead>
    <tbody>
      <?php if ($colaborador == FALSE): ?>
        <tr><td colspan="8">Nenhum colaborador encontrado.</td></tr>
      <?php else: ?>
        <?php foreach ($colaborador as $row): ?>
          <tr>
            <td class="col"><?= $row['nome'] ?></td>
            <td class="col"><?= $row['email'] ?></td>
            <td class="col"><?= $row['CPF'] ?></td>
            <td class="col"><?= $row['sexo'] ?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>
