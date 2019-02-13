

	<h1>Colaboradores</h1>
	<div id="body">
		<div class="row ml-1 mb-2">
				<a class="btn btn-primary text-light mr-2" href="<?=base_url('addC')?>">Novo colaborador</a>
				<a class="btn btn-primary text-light mr-2" href="<?=base_url('GerarPDF_Colab')?>">Gerar PDF</a>

			</div>
			<div class="table-responsive">
			<table class=" table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nome</th>
						<th scope="col">Email</th>
						<th scope="col">CPF</th>
						<th scope="col">Sexo</th>
						<th scope="col">Empresa</th>
						<th scope="col">Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($colaborador == FALSE): ?>
						<tr><td colspan="8">Nenhum colaborador encontrado.</td></tr>
					<?php else: ?>
						<?php foreach ($colaborador as $row): ?>
							<tr>
								<th scope="row"><?= $row['id_colaborador'] ?></td>
								<td><?= $row['nome'] ?></td>
								<td><?= $row['email'] ?></td>
								<td><?= $row['CPF'] ?></td>
								<td><?= $row['sexo'] ?></td>
								<td><?php foreach ($empresas as $count):
											if($count['id_empresa']==$row['empresa_id']){
												echo $count['nome'];
												break;
											}
										endforeach;
										?></td>
								<td><a href="<?= base_url('editarC')."/".$row['id_colaborador'] ?>">[Editar]</a> <a href="<?= base_url('excluirC')."/".$row['id_colaborador'] ?>">[Excluir]</a></td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
</div>
