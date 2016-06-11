<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<header>
		<div class="hoofd2">
				<nav  class="head">
					<ul class="lijst">
						<li><a href="index.php"> home</li>
						<li class="lijst1"><a href="index.php?page=truck"><img src="assets/images/nav_truck.png" alt="truck" width="81px" height="98px"></a><p>Trucks</p></li>
						
						<li class="lijst2"><a href="index.php?page=cart"><img src="assets/images/nav_winkelmand.png" alt="truck"></a><p>Winkelmand</p></li>
						<li class="lijst3">Contact</li>
					</ul>
				</nav>
		</div>
	</header>
	
	<h1>Overzicht winkelwagen</h1>
  <a href="index.php?page=truck">Terug naar het overzicht</a>
  <form action="index.php?page=order" method="POST">
	<ul>
		<?php if(empty($products)){
			echo "<p> Uw winkelkar is leeg.</p>";
		} else {
			foreach($products as $product){
				?>

				<li>
        			<img src="assets/images/<?php echo $product['img'];?>">
        			
        			<?php echo $product['text'];?>
        			<?php echo $product['price'];?>
       			 </li>
				<?php
			}

		}
		?>

	</ul>

		<p>totaal:<?php echo $subtotal;?></p>
		
		
			<input type="submit" value="bestel">
			<input type="hidden" name="bestel" value="<?php echo $product['id']?>"/>
		</form>

	<a href="index.php?page=empty-cart">Leeg winkelkar</a>
</body>
</html>