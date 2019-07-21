<?php
// Incluimos el archivo de conexion a la base de datos
include "connect.php";
// La siguiente es la consulta para obtener los productos de la BD
$sql = "SELECT * FROM productos";
// Nos conectamos a la BD
$con = connect();
// Ejecutamos la consulta SQL
$query  = $con->query($sql);
// Hacemos un recorrido de los resultados y guardamos todo en la variable DATA
$data = array();
while($r = $query->fetch_object()){
	$data[] = $r;
}
?>

<?php 
// Si los elementos de la variable data son > 0
if(count($data)>0):?>
<button id="selall">Seleccionar todo</button>
<button id="delselected">Eliminar seleccionados</button>
<br><br>
<table border="1">
	<thead>
		<th></th>
		<th>Nombre</th>
		<th>Precio</th>
	</thead>
<?php 
// Hacemos un reccorrido de la variable data
foreach($data as $d):?>
	<tr>
		<td>
			<input type="checkbox" id="product-<?php echo $d->id; ?>" class="check">
		</td>
		<td><?php echo $d->nombre; // Nombre del producto ?></td>
		<td><?php echo $d->precio;// Precio del producto ?></td>
	</tr>
<?php endforeach; ?>
</table>

<script type="text/javascript">
	$(document).ready(function(){

		$("#selall").click(function(){
			// Obtenenos los ids de todos los elementos
			checks = document.querySelectorAll(".check");
			if(checks.length>0){
				for(i=0;i<checks.length;i++){
					checks[i].checked=true;
				}
			}
		});

		$("#delselected").click(function(){
			// Obtenenos los ids de los elementos que esten seleccionados "checked"
			checks = document.querySelectorAll(".check:checked");
			// Verificamos que la cantidad de elementos seleccionados sea mayor a 0 (cero)
			if(checks.length>0){
				// Si hay elementos seleccionados
				// Le preguntamos al usuario si esta seguro de eliminar
				x = confirm("Estas seguro de eliminar "+checks.length+" elemento(s) ?");
				if(x){
				// Si el usuario esta seguro, procedemos
				// la variable ids contiene los IDs de los elementos seleccionados
				ids = "";
				// En el siguiente ciclo vamos a recorrer los elementos seleccionamos y guardaremos los IDs separados por comas (,) en la variable ids
				for(i=0;i<checks.length;i++){
					// Los ids de los productos estan en los checkbox como "producto-ID" entonces tenemos que hacer SPLIT y despues usar el elemento [1] que es el ID, el elemento [0] es "product"
					p = checks[i].id.split("-");
					// agregamos el ID a la variable ids
					ids += p[1] + ",";
				}
				// En la siguiente funcion AJAX vamos a enviar los IDS al archivo eliminar_producto.php
				$.get("eliminar_producto.php","ids="+ids,function(d){ 
					// Una vez finalizada la eliminacion procedemos a recargar los productos de  nuevo.
					$.get("productos.php","",function(data){
						$("#products").html(data);
					});	
				 });
			}
			}else{
				// Si no hay elementos seleccionados
				alert("No hay productos seleccionados");
			}
		});
	});
</script>
<?php else:?>
	<p>No hay productos</p>
<?php endif; ?>
