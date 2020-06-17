
<?php
check_admin();


// con esta linea eliminamos las noticias  no los errores

//agregar la libreria
require ('phpqrcode/qrlib.php');
// Si se apreta el boton generar, da la condicion como true.
if(isset($_POST['generar']))
{
// Verificamos que no haya ningun dato sin rellenar cod
  if(!empty($_POST['cod']))
   {
   //creamos la carpeta dir para guardar los codigos qr generados
  $dir = './';
  //pregunatar si existe la carpeta dir y ! si no existe crear 
  if(!file_exists($dir))
        mkdir($dir);
    {
  //variables 
  $cod = htmlentities($_POST['cod']); //dato a generar qr
    $tam = htmlentities($_POST['tam']); //tamaño de la imagen qr
    $niv = htmlentities($_POST['niv']); //nivel de seguridad
  $filename = $dir.'test.png'; //archivo qr donde se guardara
    $frameSize = 3; // marco

$image = imagecreatefrompng($filename);
$bg = imagecreatetruecolor(imagesx($image), imagesy($image));
imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
imagealphablending($bg, TRUE);
imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
imagedestroy($image);
$quality = 50; // 0 = worst / smaller file, 100 = better / bigger file 
imagejpeg($bg, $filename . ".jpg", $quality);
imagedestroy($bg);



  //clase Qr:: funcion png
         QRcode::png($cod, $filename, $niv, $tam, $frameSize);
         echo '<img src="'.$filename.'" align="center" />';
    } 
   } 
 }
?>





<!DOCTYPE HTML>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>DEMO FACTURAS PDF</title>
    <style>
        body {
            font-family: sans-serif, verdana, arial;
        } 
        
        table tr td:first-child
        {
            text-align: right;
        }
    </style>
</head>
<body>
<center>
<h3>DEMO DE GENERAR FACTURAS EN FORMATO PDF CON PHP</h3>
<h4>El script creará la factura para que la guardes en tu PC personal, el script elimina automáticamente la factura, de modo que sólo pueda tener acceso a la misma el administrador.</h4>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body > 

    <form  action="" method="post" enctype="multipart/form-data">
    <font color="white">
    <h3>Base de datos dbsistema</h3>
    Tabla 'Persona':<br>
    C.I Persona  <br>
    <select name ="cod">
            <option value="">Seleccione una categoria</option>
      <?php
        $q = $mysqli->query("SELECT * FROM categorias ORDER BY categoria ASC");

        while($r=mysqli_fetch_array($q)){
          ?>
            <option value="<?=$r['id']?>"><?=$r['categoria']?></option>
          <?php
        }
      ?>
    </select>
        <h4> 
   <?php echo '<font color="white">'.'Codificado: '.$cod.'</font>'; ?>
      
    </h4>
      Nivel:<select name="niv">
           
            <option>H</option>
      </select>
        Tamaño:<select name="tam">
            <option>5</option>
            
        </select><br><br>
          <input name="generar" type="submit" value="Generar" style="color: black;height: 30px; width: 150px">
</font>
 </form>





<form method="post" action="facturas/facturas.php" enctype="multipart/form-data">
    <button type="submit">GENERAR FACTURA PDF</button>
    
    <h3>Los datos de la factura demo son los siguientes ...</h3>
    
<table>
 <tr>
    <td>ID de factura:</td>
    <td><input type="text" name="id_factura" value="1" size="5"></td>
 </tr>
 <tr>
    <td>fecha emisión de factura:</td>
    <td><input type="text" name="fecha_factura" value="<?php echo date("d-m-Y"); ?>" size="15"></td>
 </tr>
 <tr>
    <td>Nombre de la tienda:</td>
    <td><select type="text" name="nombre_tienda">
            <option value="">Seleccione una categoria</option>
      <?php
        $q = $mysqli->query("SELECT * FROM categorias ORDER BY categoria ASC");

        while($r=mysqli_fetch_array($q)){
          ?>
            <option value="<?=$r['categoria']?>"><?=$r['categoria']?></option>
          <?php
        }
      ?>
    </select>




    </td>
 </tr>
 <tr>
    <td>Dirección de la tienda:</td>
    <td><input type="text" name="direccion_tienda" value="C/ demostración nº 1" size="50"></td>
 </tr>
 <tr>
    <td>Población de la tienda:</td>
    <td><input type="text" name="poblacion_tienda" value="Madrid" size="25"></td>
 </tr>
 <tr>
    <td>Provincia de la tienda:</td>
    <td><input type="text" name="provincia_tienda" value="Madrid" size="25"></td>
 </tr>
 <tr>
    <td>Código Postal de la tienda:</td>
    <td><input type="text" name="codigo_postal_tienda" value="28080" size="5"></td>
 </tr>
 <tr>
    <td>Teléfono de la tienda:</td>
    <td><input type="text" name="telefono_tienda" value="900 00 00 00" size="15"></td>
 </tr>
 <tr>
    <td>Fax de la tienda:</td>
    <td><input type="text" name="fax_tienda" value="900 00 00 00" size="15"></td>
 </tr>
 <tr>
    <td>Identificacion Fiscal de la tienda:</td>
    <td><input type="text" name="identificacion_fiscal_tienda" value="11223344N" size="15"></td>
 </tr>
 <tr>
    <td><hr></td>
    <td><hr></td>
 </tr>
 <tr>
    <td>Nombre del cliente:</td>
    <td><input type="text" name="nombre_cliente" value="Fernando" size="15"></td>
 </tr>
 <tr>
    <td>Apellidos del cliente:</td>
    <td><input type="text" name="apellidos_cliente" value="García García" size="15"></td>
 </tr>
 <tr>
    <td>Dirección del cliente:</td>
    <td><input type="text" name="direccion_cliente" value="C/ cualquiera nº 1" size="50"></td>
 </tr>
 <tr>
    <td>Población del cliente:</td>
    <td><input type="text" name="poblacion_cliente" value="Sevilla" size="25"></td>
 </tr>
 <tr>
    <td>Provincia del cliente:</td>
    <td><input type="text" name="provincia_cliente" value="Sevilla" size="25"></td>
 </tr>
 <tr>
    <td>Código Postal del cliente:</td>
    <td><input type="text" name="codigo_postal_cliente" value="41070" size="5"></td>
 </tr>
 <tr>
    <td>Identificacion Fiscal del cliente:</td>
    <td><input type="text" name="identificacion_fiscal_cliente" value="44332211N" size="15"></td>
 </tr>
</table>

<h3>PRODUCTOS</h3>

<table cellpadding="5" border="1">
 <tr>
    <td>Impuestos:</td>
    <td><input type="text" name="iva" value="21" size="5"> %</td>
 </tr>
 <tr>
    <td>Gastos de envío</td>
    <td><input type="text" name="gastos_de_envio" value="5.95" size="5"> €</td>
 </tr>
</table>

<p><mark>¡Ver código fuente para ver simulación de extracción de los datos de productos de una base de datos!</mark></p>

<table cellpadding="5" border="1">
    <tr><th>Unidades</th><th>Productos</th><th>Precio unidad</th></tr>
<?php
//Demo de Array de productos simulando extracción de datos de una base de datos.
$array_productos = array
(
"unidades" => array(1, 4, 3), 
"productos" => array("Zapatos", "Camisetas", "Pantalones"),
"precio_unidad" => array(20.30, 15, 50)
);
$x = 0;
while($x <= count($array_productos["unidades"]) - 1)
{
echo 
"
<tr>
<td>".$array_productos["unidades"][$x]."</td>
<td>".$array_productos["productos"][$x]."</td>
<td>".$array_productos["precio_unidad"][$x]." €</td>
</tr>
";
$x++;
}
// A continuación se guardan en variables los datos de los productos, separados por comas
// que luego serán extraídos a través de la función explode a la hora de generar la factura
$unidades = implode(",", $array_productos["unidades"]);
$productos = implode(",", $array_productos["productos"]);
$precio_unidad = implode(",", $array_productos["precio_unidad"]);
// A continuación se guardarán los datos de los productos a través de campos ocultos
?>
</table>

<input type="hidden" name="unidades" value="<?php echo $unidades; ?>">
<input type="hidden" name="productos" value="<?php echo $productos; ?>">
<input type="hidden" name="precio_unidad" value="<?php echo $precio_unidad; ?>">
<!-- Campo que hace la llamada al script que genera la factura -->
<input type="hidden" name="generar_factura" value="true">
</form>
<br><br><br><br>
</center>
</body>

</html>