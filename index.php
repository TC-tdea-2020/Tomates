<?php
include "configs/config.php";
include "configs/funciones.php";
	
if(!isset($p)){
	$p = "principal";
}else{
	$p = $p;
}



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/estilo.css"/>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
	<link rel="stylesheet" href="fontawesome/css/all.css"/>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="fontawesome/js/all.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script type="text/javascript" src= "js/mine.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
	<title>Tienda Online</title>
</head>
<body>

<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+573162498237", // WhatsApp number
            call_to_action: "Hola este es un mensaje", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->


	<div class="contendor">
	<div class="header">
		TOMATES CHECHO
	</div>

<header-1>
	<nav class="menu">

	  <ul>
		<li><a href="?p=principal">Principal</a></li>
		<li><a href="?p=productos">Productos</a></li>
		<li><a href="?p=ofertas">Ofertas</a></li>
		<?php
		if(isset($_SESSION['id_cliente'])){
		?>
		<li><li><li><li><a href="?p=carrito">Mi Carrito</a></li>
		<li><li><li><a href="?p=miscompras">Mis Compras</a></li>
		<?php
		}else{
			?>
				<li><a href="?p=login">Iniciar Sesion</a></li>
				<li><a href="?p=registro">Registrate</a></li>
			<?php
		}
		?>
		<li><a href="admin/">Panel Admin</a></li>
		<!--
		<a href="?p=admin">Administrador</a>
		-->

		<?php
			if(isset($_SESSION['id_cliente'])){
		?>

		<li><a class="pull-right subir" href="?p=salir">Salir</a></li>
		<li><a class="pull-right subir" href="#"><?=nombre_cliente($_SESSION['id_cliente'])?></a></li>

		<?php
			}
		?>
	</nav>
	    </ul>
</header-1>

	<div class="cuerpo">
		<?php
			if(file_exists("modulos/".$p.".php")){
				include "modulos/".$p.".php";
			}else{
				echo "<i>No se ha encontrado el modulo <b>".$p."</b> <a href='./'>Regresar</a></i>";
			}
		?>
	</div>


	<div class="carritot" onclick="minimizer()">
		Carrito de compra
		<input type="hidden" id="minimized" value="0"/>
	</div>

	<div class="carritob">

		<table class="table table-striped">
	<tr>
		<th>Nombre del producto</th>
		<th>Cantidad</th>
		<th>Precio </th>
	</tr>

	
<?php
$id_cliente = clear($_SESSION['id_cliente']);
$q = $mysqli->query("SELECT * FROM carro WHERE id_cliente = '$id_cliente'");
$monto_total = 0;
while($r = mysqli_fetch_array($q)){
	$q2 = $mysqli->query("SELECT * FROM productos WHERE id = '".$r['id_producto']."'");
	$r2 = mysqli_fetch_array($q2);

	$preciototal = 0;
			if($r2['oferta']>0){
				if(strlen($r2['oferta'])==1){
					$desc = "0.0".$r2['oferta'];
				}else{
					$desc = "0.".$r2['oferta'];
				}

				$preciototal = $r2['price'] -($r2['price'] * $desc);
			}else{
				$preciototal = $r2['price'];
			}

	$nombre_producto = $r2['name'];

	$cantidad = $r['cant'];

	$precio_unidad = $r2['price'];
	$precio_total = $cantidad * $preciototal;
	$imagen_producto = $r2['imagen'];

	$monto_total = $monto_total + $precio_total;

	

	?>
		<tr>
			<td><?=$nombre_producto?></td>
			<td><?=$cantidad?></td>
			<td><?=$precio_unidad?> <?=$divisa?></td>
		</tr>
	<?php
}
?>
</table>
<br>
<span>Monto Total: <b class="text-green"><?=$monto_total?> <?=$divisa?></b></span>

<br><br>
<form method="post" action="?p=carrito">
	<input type="hidden" name="monto_total" value="<?=$monto_total?>"/>
	<button class="btn btn-primary" type="submit" name="finalizar"><i class="fa fa-check"></i> Validar Carrito </button>
</form>

	</div>

	<div class="footer">
		Tecnológico de Antioquia &copy; <?=date("Y")?>
	</div>

</div>
</body>
</html>

<script type="text/javascript">
	
	function minimizer(){

		var minimized = $("#minimized").val();

		if(minimized == 0){
			//mostrar
			$(".carritot").css("bottom","350px");
			$(".carritob").css("bottom","0px");
			$("#minimized").val('1');
		}else{
			//minimizar

			$(".carritot").css("bottom","0px");
			$(".carritob").css("bottom","-350px");
			$("#minimized").val('0');
		}
	}
</script>