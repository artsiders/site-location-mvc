<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= ASSETS;?>css/topbar.css">

<header id="header_top">
	<i class="fa fa-home" onclick="href();" id="logo"></i>
	<span id="app_name"><h2 onclick="href();">getHouse</h2></span>
	<i class="fa fa-2x fa-caret-down" id="arrow_down"></i>
	<form action="" method="POST">
		<?php require "selectCustom.php" ?>
		<button id="btn_filter" type="submit">filtrer <i class="fa fa-filter"></i></button>
	</form>
</header>

<script>

	// show my form on mobile___________________________________________
	var arrowDown = document.querySelector("#arrow_down");
	var form = document.querySelector("#header_top form");

	arrowDown.addEventListener("click", () => {
		form.classList.toggle("toggle_form");
		arrowDown.classList.toggle("rotate");
	});
	// END __________________________________________________

	function href(){
		location.assign("./home");
	}


<?= "</script>";?>