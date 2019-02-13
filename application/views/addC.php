<div class="container">

    <form method="POST" action="<?=base_url('salvarC')?>" enctype="multipart/form-data">
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
          <label for="email">Endereço de email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Insira um email">
        </div>
        <div class="form-group">
          <label for="cnpj">CPF</label>
          <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Insira um CPF">
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
