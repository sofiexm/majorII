<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
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

	<p>Bedankt voor uw bestelling,</br> vooralleer wij deze tot bij u kunnen brengen,</br>
	vragen wij enkele gegevens van u</p>

	<form action="index.php?page=pay" method="POST">
		<input type="text" value=""  name="first_name" placeholder="Sofie" />
		<input type="text" value=""  name="last_name" placeholder="Marey" />
		<input type="text" value=""  name="email" placeholder="sofie.marey@student.howest.be">
		<input type="text" value=""  name="address" placeholder="Graaf Karel laan 15" />
		<input type="text" value=""  name="postal_code" placeholder="8500" />
		<input type="text" value=""  name="city" placeholder="Kortrijk">
		<input type="submit" value="bevestigen" name="bevestigen" placeholder="bevestigen">
	</form>
	
</body>
</html>