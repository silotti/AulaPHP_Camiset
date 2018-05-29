
<!-- Pagina inicial  -->
<body>
</br>
	<div class="row">
		<div class="col-sm-2 altcentro" style="text-align: center;">
			<!-- coluna esquerda  -->
			<div class="btn-group-vertical btn-group-lg" role="group" aria-label="vertical button group">
		 	<ul class="nav flex-column">
				<li class="nav-item">
					<a class="nav-link active" href="./?listar=usuarios">TB_usuario</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="./?listar=produto">TB_produto</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./?listar=compra">TB_compra</a>
				</li>	
		 	</ul>
			</div>
		</div>
		
		<div class="col-sm-8 altcentro" style="background-color: #a5a5a5;">

		 <?php
		  if ($_GET["listar"]=="usuarios") {
			include "1.php";
		  }
		  if ($_GET["listar"]=="produto") {
			include "2.php";
		  }
		  if ($_GET["listar"]=="compra") {
			include "3.php";
		  }
		 ?>
		</div>
	</div>
</body>
