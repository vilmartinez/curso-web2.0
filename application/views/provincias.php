<?php $this->load->view('layout/header') ?>

<h1><?php echo $titulo ?></h1>
<table class="table table-bordered table-striped">
	<tr>
		<th>ID</th>
		<th>Nombre</th>
	</tr>
	<?php
	foreach($provincias as $key=>$provincia){
		?><tr>
				<td><?php echo $provincia['id'] ?></td>
				<td><?php echo $provincia['nombre'] ?></td>
		</tr><?php
	}
	?>
</table>

<?php $this->load->view('layout/footer') ?>