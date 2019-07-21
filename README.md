# eliminar_multiples_campos
Vamos a eliminar elementos seleccionados de una tabla usando ajax, los datos estarán cargados en una base de datos MySQL.
Este ejemplo sirve para todo tipo de proyectos donde tenemos que eliminar varios items y eliminar de uno en uno es muy difícil.

Código
En el ejemplo tenemos básicamente 5 archivos.

schema.sql: contiene la estructura de la base de datos, solo es una tabla
index.php: es el archivo principal y contenedor.
connect.php: contiene la conexión a la base de datos
productos.php: aqui se muestran todos los productos (de este archivo hablaremos en detalle)
eliminar_producto.php: obtiene los ids y elimina los productos
Vamos a hablar principalmente del archivo productos.php ya que contiene las piezas jquery y javascript que vamos a utilizar. El resto de codigo PHP es el mismo para la mayoria de cosas, como obtener los datos de la base de datos y mostrarlos.
