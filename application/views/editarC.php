<div class="container">
    <form method="POST" action="<?=base_url('atualizarC')?>" enctype="multipart/form-data">
      <div class="form-group">
        <label for="empresa">Empresa</label>
        <select class="form-control" name="empresa_id" id="empresa">
          <?php foreach ($empresas as $row): ?>
          <option value="<?= $row['id_empresa'] ?>" <?php if($row['id_empresa']==$colaborador['empresa_id']){ echo 'selected'; } ?>><?= $row['nome'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" name="nome" id="nome" value="<?= $colaborador['nome'] ?>">
        </div>
        <div class="form-group">
          <label for="email">Endereço de email</label>
          <input type="email" class="form-control" name="email" id="email" value="<?= $colaborador['email'] ?>">
        </div>
        <div class="form-group">
          <label for="cnpj">CPF</label>
          <input type="text" class="form-control" name="cpf" id="cpf" value="<?= $colaborador['CPF'] ?>">
        </div>
        <div class="form-group">
          <label for="sexo">Sexo</label>
          <select class="form-control" name="sexo" id="sexo">
            <option value="masculino" <?php if($colaborador['sexo']=='masculino'){ echo 'selected'; } ?>>Masculino</option>
            <option value="feminino" <?php if($colaborador['sexo']=='feminino'){ echo 'selected'; } ?>>Feminino</option>
          </select>
        </div>
        <input type="hidden" name="id_colaborador" value="<?=$colaborador['id_colaborador']?>"/>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
