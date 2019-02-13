<div class="container">

  <h1>Empresas cadastradas</h1>
  <table class="table">
    <thead class="border">
      <tr >
        <th class="col" scope="col"><h3>Nome</h3></th>
        <th class="col" scope="col"><h3>CNPJ</h3></th>
      </tr>
    </thead>
    <tbody>
      <?php if ($empresa == FALSE): ?>
        <tr><td colspan="8">Nenhuma empresa encontrada.</td></tr>
      <?php else: ?>
        <?php foreach ($empresa as $row): ?>
          <tr>
            <td class="col"><?= $row['nome'] ?></td>
            <td class="col"><?= $row['CNPJ'] ?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>
