<?php $this->load->view('layout/header')?>

<h1><?php echo $titulo?></h1>
<a href="<?php
//etiqueta a y una de php para especificar del controlador
//todo lo que viene atras esto por si cambio de servidor
echo base_url()?>admin/provincia/agregar"
	class="btn btn-primary">Agregar</a>
<table class="table table-bordered table-striped">
	<tr>
		<th>ID</th>
		<th>Nombre</th>
	</tr>
<?php
foreach ($provincias as $provincia) {
	?><tr>
			<td><?php echo $provincia['id']?></td>
			<td><?php echo $provincia['nombre']?></td>
			<td><a href="<?php 
		echo base_url().
		'admin/provincia/editar/'.
		$provincia['id'] ?>"
			class="btn btn-primary">Editar</a>
			<button
				value="<?php echo $provincia['id']?>"
				class="eliminar btn btn-danger"

				>Eliminar</button></td>
			</tr><?php
}
?>
</table>
<script>
$(document).ready(function(){
	//busque los elementos que tenga la clase eliminar
	//$(".eliminar").click(function(){
	//	alert('Está seguro');
	//});
	function eliminar(){
		var elimina = confirm('Está seguro de eliminar: '+$(this).val());
		//se utiliza el signo + para concatenar
		//this.val se le dice que capture ese valor
		// Se eliminó del button la siguiente línea
		//		class="eliminar btn btn-danger"
		//		onclick="alert('¿Desea eliminarlo?')"
		//confirm es un mensaje y jscript espera a que oprimamos cancelar
		//o aceptar.
		if(elimina){
			//alert('registro eliminado');
			$.post( "<?php echo base_url()
			?>admin/provincia/eliminar/"+$(this).val(),
				function( data ) {
			//$( ".result" ).html( data );
			//alert(data);
			//si envió desde provincia un 1 se elimina el registro
					if(data==1){
						$(location).attr('href',
						'<?php echo base_url()?>admin/provincia/index');
					}
				}
				);
				//http://librojquery.com/
				//http://api.jquery.com/jquery.pos/
		}
	}
	$(".eliminar").click(eliminar);
});	

</script>
<?php
$this->load->view('layout/footer');
