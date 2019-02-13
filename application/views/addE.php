<div class="container">

    <form method="POST" action="<?=base_url('salvarE')?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nome">Nome da Empresa</label>
          <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome da empresa">
        </div>
        <div class="form-group">
          <label for="cnpj">CNPJ da Empresa</label>
          <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="CNPJ da empresa">
        </div>
        <div class="form-group">
          <label for="email">Endereço de email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Insira um email">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
