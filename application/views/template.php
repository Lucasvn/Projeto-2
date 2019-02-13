<!DOCTYPE HTML>
<html lang="pt-br">
<head>
		<meta charset="utf-8">
		<title>Projeto 2</title>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"/>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>
<div id="cabecalho">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<a class="navbar-brand text-white" href="#"><b>Projeto 2</b></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon"></span>
  			</button>
				<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			    	<ul class="navbar-nav mr-auto offset-md-1 mt-2 mt-lg-0">
			      	<li class="nav-item <?php if($page == 'emp'){ echo 'active'; } ?>">
										<a class="nav-link" href="<?= base_url('/') ?>">Empresas<span class="sr-only">(current)</span></a>
			      	</li>
			      	<li class="nav-item <?php if($page == 'colab'){ echo 'active'; } ?>">
			        		<a class="nav-link" href="<?= base_url('colaboradores') ?>">Colaboradores</a>
			      	</li>
			    	</ul>
  			</div>
		</nav>
</div>

	<div class="mt-4">

			<div id="container" class="col-lg-10 container-fluid offset-md-1">
					<?php echo $contents; ?>
			</div>
	</div>

</div>
</body>
