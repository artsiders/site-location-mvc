<link rel="stylesheet" href="<?= ASSETS;?>css/sidebar.css">
<nav id="nav_menu">
	<div id="side_bar">
		<i class="fa fa-2x fa-bars" id="hamberger_nav"></i>
		<i class="fa fa-2x fa-user-o" id="user_profil"></i>
		<a href="#" id="iconTheme"><i class="fa fa-2x fa-adjust"></i></a>

		<a href="#"><i class="fa fa-2x fa-plus-circle" id="add"></i></a>
		<div class="space"></div>
	</div>
	<div id="drop_menu">
		<div class="logo">
			<img src="<?= ASSETS;?>images/profil_small.png" alt="profil">
			<p>Dragononez250@gmail.com</p>
		</div>
		<div class="menu">
			<span>
				<i class="fa fa-tachometer"></i>
				<a href="#">mes appartement</a>
			</span>
			<span>
				<i class="fa fa-envelope-o"></i>
				<a href="#">nous contacter</a>
			</span>
			<span id="switch_theme">
				<i class="fa fa-adjust"></i>
				<a href="#">theme sombre</a>
				<label class="labelColor" for="boxColor"><i class="fa fa-eercast"></i></label>
				<input type="color" id="boxColor" value="#2196f3">
			</span>
			<span>
				<i class="fa fa-book"></i>
				<a href="#">a propos</a>
			</span>
			<span>
				<i class="fa fa-sign-out"></i>
				<a id="disconect">deconnexion</a>
			</span>
		</div>
		<div class="version">
			<p>Version 1.0.0</p>
		</div>

	</div>
	<div id="drop_user_profil">
		<div class="cover_profil">
			<div class="box_photo">
				<img src="<?= ASSETS;?>images/profil_small.png" alt="profil">
				<i class="fa fa-pencil-square-o"></i>
			</div>
		</div>
		<div class="menu_profil">
			<span>
				<i class="fa fa-pencil-square-o"></i>
				<a href="#">modifil le profil</a>
			</span>
			<span>
				<i class="fa fa-envelope-o"></i>
				<a href="#"><?= $_SESSION['user'][0]['email']; ?></a>
			</span>
			<span>
				<i class="fa fa-phone"></i>
				<a href="#">+237 <?= $_SESSION['user'][0]['tel']; ?></a>
			</span>
			<span>
				<i class="fa fa-map"></i>
				<a href="#">bafoussam</a>
			</span>
			<span>
				<i class="fa fa-sign-out"></i>
				<a href="#">deconnexion</a>
			</span>
		</div>
		<div class="version">
			<p>Version 1.0.0</p>
		</div>
	</div>
</nav>

<script src="<?= ASSETS;?>js/switchTheme.js"></script>
<script>
	const switchTheme = document.querySelector("#switch_theme a");
	const iconTheme = document.querySelector("#iconTheme");

	// definition du theme par defaut
	if(localStorage.getItem("theme") === null) {
		localStorage.setItem("theme", "light");
    } else {
		// debugger
		if(localStorage.getItem("theme") == "dark") {
             darkTheme();
			//  localStorage.setItem("theme", "light");
        } 
		else if(localStorage.getItem("theme") == "light") {
             lightTheme();
			//  localStorage.setItem("theme", "dark");
        }
	}

	iconTheme.addEventListener("click", changeTheme);
	switchTheme.addEventListener("click", changeTheme);
	
	function changeTheme (e) {
		e.preventDefault();

		if(localStorage.getItem("theme") == "dark") {
			lightTheme();
			localStorage.setItem("theme", "light");
        } 
		else if(localStorage.getItem("theme") == "light") {
            darkTheme();
			localStorage.setItem("theme", "dark");
        }
	}

	var hambergerNav = document.getElementById("hamberger_nav");
	var userProfil = document.getElementById("user_profil");
	var dropMenu = document.getElementById("drop_menu");
	var dropUserProfil = document.getElementById("drop_user_profil");

	hambergerNav.addEventListener('click', () => {
		dropMenu.classList.toggle("drop_menu_open");

		//reset auther items
		dropUserProfil.classList.remove("drop_user_profil_open");
		userProfil.classList.remove("active");
		userProfil.classList.remove("fa-close");
		userProfil.classList.add("fa-user-o");
		// ____________________________________________

		hambergerNav.classList.toggle("active");
		hambergerNav.classList.toggle("fa-bars");
		hambergerNav.classList.toggle("fa-close");
	});

	userProfil.addEventListener('click', () => {
		dropUserProfil.classList.toggle("drop_user_profil_open");

		//reset auther items_______________________________
		dropMenu.classList.remove("drop_menu_open");
		hambergerNav.classList.remove("active");
		hambergerNav.classList.remove("fa-close");
		hambergerNav.classList.add("fa-bars");
		// ____________________________________________

		userProfil.classList.toggle("active");
		userProfil.classList.toggle("fa-user-o");
		userProfil.classList.toggle("fa-close");
	});
	// ferme le menu en cas de scroll
	// window.addEventListener("scroll", () => {
	// 	dropUserProfil.classList.remove("drop_user_profil_open");
	// 	userProfil.classList.remove("active");
	// 	userProfil.classList.remove("fa-close");
	// 	userProfil.classList.add("fa-user-o");
	// 	// ___________________________________________
	// 	dropMenu.classList.remove("drop_menu_open");
	// 	hambergerNav.classList.remove("active");
	// 	hambergerNav.classList.remove("fa-close");
	// 	hambergerNav.classList.add("fa-bars");
	// });

	var btnDisconnect = document.querySelector("#disconect");

	btnDisconnect.addEventListener('click', (e) => {
		e.preventDefault();
		var isOk = confirm('vouler vous vous deconnecter ?');
		isOk = isOk ? location.assign("<?= HOST;?>index.php?action=logOut") : "";
	});

	// var btnDisconnect = document.querySelector("#disconect");

	// btnDisconnect.addEventListener('click', (e) => {
	// 	e.preventDefault();
	// 	var isOk = confirm('vouler vous vous deconnecter ?');
	// 	isOk = isOk ? location.assign("<?php //echo HOST;?>index.php?action=logOut") : "";
	// });


	//afficher le formulaire d'ajout des maison
	var add = document.querySelector("#add");
	add.addEventListener("click", () => {
		document.querySelector('.contentAdd').classList.remove('hideContentAdd');
	});

	var boxColor = document.querySelector("#boxColor");
	// var userColor = 
	boxColor.addEventListener("input", (e) => {
		let value = e.target.value;
		document.documentElement.style.setProperty('--primary', `${value}`);

		<?php $_SESSION['theme'] = "";?>
	});
</script>