<div class="container">

    <form method="POST" action="<?=base_url('salvarC')?>" enctype="multipart/form-data">
      <h3>Listar por...</h3>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Empresa</label>
      </div>
      <div class="form-group">
        <label for="empresa">Empresa</label>
        <select class="form-control" name="empresa_id" id="empresa">
          <?php foreach ($empresa as $row): ?>
          <option value="<?= $row['id_empresa'] ?>"><?= $row['nome'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
        </div>
        <div class="form-group">
          <label for="sexo">Sexo</label>
          <select class="form-control" name="sexo" id="sexo">
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
