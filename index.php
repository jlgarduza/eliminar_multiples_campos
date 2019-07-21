<!DOCTYPE html>
<html>
<head>
	<title>Productos</title>
	<script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>

<h1>Productos</h1>

<div id="products"></div>

<script type="text/javascript">
	$(document).ready(function(){
		function getproducts(){
			$.get("productos.php","",function(data){
				$("#products").html(data);
			});			
		}
		getproducts();
	});
</script>


</body>
</html>
