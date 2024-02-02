<!DOCTYPE html>
<?php
   require_once('Pc.php'); // Asegúrate de tener el nombre correcto del archivo de la clase Pc
?>
<html>
	<head>
		<title>Lista de Componentes</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
	<?php

		$objPc = new Pc();
		$name_component = "";
		$type_component = "";
		$brand_component = "";
		$price = "";

		if (isset($_POST['guardar']))
		{
			$objPc->name_component = $_POST['name_component'];
			$objPc->type_component = $_POST['type_component'];
			$objPc->brand_component = $_POST['brand_component'];
			$objPc->price = $_POST['price'];

			$result = $objPc->incluir();

			if ($result == 1) {
				echo "<script>alert('Componente registrado con éxito')</script>";
			}
		}

		if (isset($_POST['buscar']))
		{
			$objPc->name_component = $_POST['name_component'];

			if ($objPc->buscar())
			{
				$name_component = $objPc->name_component;
				$type_component = $objPc->type_component;
				$brand_component = $objPc->brand_component;
				$price = $objPc->price;
			}
			else
			{
				echo "<script>alert('No se encontraron los datos')</script>";
			}
		}

		if (isset($_POST['modificar']))
		{
			$objPc->name_component = $_POST['name_component'];
			$objPc->type_component = $_POST['type_component'];
			$objPc->brand_component = $_POST['brand_component'];
			$objPc->price = $_POST['price'];

			if ($objPc->modificar())
			{
				echo "<script>alert('Componente modificado con éxito')</script>";
			}
			else
			{
				echo "<script>alert('No se pudo modificar el componente')</script>";
			}
		}

		if (isset($_POST['eliminar']))
		{
			$objPc->name_component = $_POST['name_component'];
			$objPc->type_component = $_POST['type_component'];
			$objPc->brand_component = $_POST['brand_component'];
			$objPc->price = $_POST['price'];

			if ($objPc->eliminar())
			{
				echo "<script>alert('Componente eliminado con éxito')</script>";
			}
			else
			{
				echo "<script>alert('No se pudo eliminar el componente')</script>";
			}
		}

		if (isset($_POST['salir']))
		{
			$objPc->cerrar_conexion();
			if ($objPc->cerrar_conexion() == null)
			{
				echo "<script>alert('Conexión cerrada')</script>";
			}
		}
	?>
		<center><h1>DATOS DEL COMPONENTE</h1></center>
		<br> <br>
		
        <form action="" method="POST">
			<div id="f1">
				<center><label for="name_component">Nombre del Componente: </label>
                <input type="text" id="name_component" name="name_component" value="<?php echo $name_component; ?>"> </center><br><br>
                <center><label for="type_component">Tipo de Componente: </label>
                <input type="text" id="type_component" name="type_component" value="<?php echo $type_component; ?>"> </center><br><br>
                <center><label for="brand_component">Marca del Componente: </label>
                <input type="text" id="brand_component" name="brand_component" value="<?php echo $brand_component; ?>"></center><br><br>
				<center><label for="price">Precio del Componente: </label>
                <input type="text" id="price" name="price" value="<?php echo $price; ?>"></center><br><br>
			</div>
			<center>
				<input type="submit" value="Buscar" name="buscar">
				<input type="submit" value="Guardar" name="guardar">
				<input type="submit" value="Modificar" name="modificar">
				<input type="submit" value="Eliminar" name="eliminar">
				<input type="button" value="Limpiar" onclick="Limpiar();" >
                <input type="submit" value="Salir" Name ="salir">
			</center>
		</form>	
			
		<script type="text/javascript">
			function Limpiar() {
				let t = document.getElementById("f1").getElementsByTagName("input");
				for (var i=0; i<t.length; i++) {
					t[i].value = "";
				}
			}	
		</script>
	</body>
</html>
