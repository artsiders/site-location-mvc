<html lang="fr">

<head>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> -->
	<link rel="stylesheet" type="text/css" href="<?= ASSETS; ?>font-awesome/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?= "" //ASSETS;
														?>css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="<?= ASSETS; ?>css/home.css">
	<!-- -------------------------------------------------------------------- -->
	<link rel="stylesheet" type="text/css" href="<?= ASSETS; ?>css/topbar.css">
	<!-- -------------------------------------------------------------------- -->
	<!-- <link rel="stylesheet" type="text/css" href="<?= "" //ASSETS; 
														?>css/social_icons.css"> -->
	<!-- -------------------------------------------------------------------- -->
	<link rel="stylesheet" type="text/css" href="<?= ASSETS; ?>css/sidebar.css">
	<!-- -------------------------------------------------------------------- -->
	<link rel="stylesheet" type="text/css" href="<?= ASSETS; ?>css/card.css">
	<!-- -------------------------------------------------------------------- -->
	<meta name="description" content="site de location de maison">
	<!-- -------------------------------------------------------------------- -->
	<link rel="icon" href="<?= ASSETS; ?>images/iconGetHouse.png">
	<!-- -------------------------------------------------------------------- -->
</head>

<body onload="ready();">
	<?php
	require_once "topbar.php";
	include_once "loader.php";
	require_once "sidebar.php";
	include_once "social_icons.php";
	include_once "notificationbulle.php";
	include_once "houseDetailsView.php";
	include_once "addHouseView.php";
	?>

	<section class="content_home">
		<div class="background_cover">
			<h1>GET THE HOUSE OF YOUR DREAM</h1>
		</div>
		<main class="box_card">
			<?php include "card.php"; ?>
		</main>
		<aside class="aside_bar">
			<header class="header_aside">
				<center>
					<div id="salutation">salut</div>
				</center>
				<center><time>samedi le 6 mai 2021 8:53:33</time></center>
			</header>
			<section class="section_aside">
				<center>
					<h1>100% Responsive</h1>
				</center>
				<img src="<?= ASSETS; ?>images/app_mobile.png">
			</section>
			<footer class="footer_aside">
				footer
			</footer>
		</aside>
		<?php include_once "footer.php"; ?>
	</section>
</body>

<script src="<?= ASSETS; ?>js/date.js"></script>
<script src="<?= ASSETS; ?>js/scrollreveal-master/dist/scrollreveal.js"></script>
<script src="<?= ASSETS; ?>js/scroll.js"></script>
<script>
	setInterval(dateTimes, 1000);
</script>

</html>