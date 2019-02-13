

	<h1>Empresas</h1>
	<div id="body">
		<div class="row ml-1 mb-2">

				<a class="btn btn-primary text-light mr-2" href="<?=base_url('addE')?>">Nova empresa</a>
				<a class="btn btn-primary text-light mr-2" href="<?=base_url('GerarPDF_Emp')?>">Gerar PDF</a>

			</div>
			<div class="table-responsive">
			<table class=" table table-striped">

				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nome</th>
						<th scope="col">Email</th>
						<th scope="col">CNPJ</th>
						<th scope="col">Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($empresa == FALSE): ?>
						<tr><td colspan="8">Nenhuma empresa encontrada.</td></tr>
					<?php else: ?>
						<?php foreach ($empresa as $row): ?>
							<tr>
								<th scope="row"><?= $row['id_empresa'] ?></td>
								<td><?= $row['nome'] ?></td>
								<td><?= $row['email'] ?></td>
								<td><?= $row['CNPJ'] ?></td>
								<td><a href="<?= base_url('editarE')."/".$row['id_empresa'] ?>">[Editar]</a> <a href="<?= base_url('excluirE')."/".$row['id_empresa'] ?>">[Excluir]</a></td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
</div>
