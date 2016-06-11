<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>truck</title>
</head>
<body>
	<div class="achtergrond">

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

		<main>
			<div class="container_truck">
				<?php foreach($trucks as $truck):?>
					

					<img class="truck_afb" src="assets/images/<?php echo $truck['img_filename']?>" width="500" height="405" alt="truck">
					
					<section class="truck_text">
						<header>
							<h1 class="truck_title"><?php echo $truck['title']?></h1>
							<img src="assets/images/<?php echo $truck['typo_filename']?>">
							<h2><?php echo $truck["subtitle"] ?></h2>
						</header>
						<p><?php echo $truck["text"]?></p>
					</section>
					<?php foreach($products as $product):?>
						<?php if($product['truck_id'] === $truck['id']): ?>

						<section>
							<div >
								<img src="assets/images/<?php echo $product['img']?>" width="260px" height="260px" alt="product">
								<p><?php echo $product["text"] ?></p>
								<p>€<?php echo $product["price"] ?></p>
								<form action="index.php?page=add-to-cart" method="POST">
									<input type="submit" value="in winkelmand" name="name" value="in winkelmand"/>
									<input type="hidden" name="productId" value="<?php echo $product['id']?>"/>
								</form>
							</div>
						</section>
					<?php endif;?>
					<?php endforeach; ?>
				<?php endforeach; ?>
					


					

			</div>

		</main>
	</div>
</body>
</html>