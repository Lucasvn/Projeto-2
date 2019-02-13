<div class="container">

    <form method="POST" action="<?=base_url('atualizarE')?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nome">Nome da Empresa</label>
          <input type="text" class="form-control" name="nome" id="nome" value="<?= $empresa['nome'] ?>">
        </div>
        <div class="form-group">
          <label for="cnpj">CNPJ da Empresa</label>
          <input type="text" class="form-control" name="cnpj" id="cnpj"  value="<?= $empresa['CNPJ'] ?>">
        </div>
        <div class="form-group">
          <label for="email">Endereço de email</label>
          <input type="email" class="form-control" name="email" id="email" value="<?= $empresa['email'] ?>">
        </div>
        <input type="hidden" name="id_empresa" value="<?=$empresa['id_empresa']?>"/>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
