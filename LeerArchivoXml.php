<?php
	$xml=simplexml_load_file("./ArchivoXml/TSL171218FP7_P6902_20190920.xml");
	$ns = $xml->getNamespaces(true);
	$xml->registerXPathNamespace('c', $ns['cfdi']);
	$xml->registerXPathNamespace('t', $ns['tfd']);

 
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Archivo Xml</title>
	<link rel="stylesheet" type="text/css" href="./public/css/bootstrap.css">
	<style type="text/css">
		body{
			background-image: url('./public/img/fondo.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
			background-position: center center;

		}
		.mainh-100{
			margin-top:20vh;
		}
	</style>
</head>
<body>
	<main class="mainh-100">
		<div class="container">
			<div class="row justify-content-center align-items-center minh-100">
				<div class="col-lg-12 text-center" style="border-top-style: aliceblue;">
					<h1>Leer archivo xml</h1>
					<table class="table">
					  <tbody>
					   <?php foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){ ?>
					   <tr>
					   	<th scope="col">Nombre</th>
					   	<td><?=$Emisor['Nombre']?></td> 	
					   </tr> 
					   <tr>
					   	<th scope="col">Rfc</th>
					   	<td><?=$Emisor['Rfc']?></td> 	
					   </tr> 
						<?php }?>

						<?php foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {?>
							<tr>  
					      		<th scope="col">UUID</th>
					      		<td><?=$tfd['UUID']?></td>
					    	</tr>
					    	<tr> 
					      		<th scope="col">Fecha de Timbrado</th>
					      		<td><?=$tfd['FechaTimbrado']?></td>
					    	</tr>	
						<?php }?>
					  </tbody>
					</table>	

				</div>	
			</div>
		</div>
	</main>	
</body>
</html>