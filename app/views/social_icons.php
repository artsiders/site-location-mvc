<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= ASSETS;?>css/social_icon.css">

<div id="social_icon">
	<div id="etiquette"><!--pour faire apparaitre l'etiquette--></div>
	<div id="facebook"></div>
	<div id="youtube"></div>
	<!-- ----------------------------------------------------- -->
	<div id="drop_whatsapp_number">
		<span>
			<i class="fa fa-copy"></i>
			<textarea id="textCopy">+237 682 69 67 34</textarea><!-- invisible pour l'utilisateur-->
			<em>+237 682 69 67 34</em>
		</span>
	</div>
	<div id="whatsapp"><!--- drop_whatsapp_number --></div>
	<!-- --------------------------------------- -->
	<div id="gMail"><a href="mailto:jimsky699@gmail.com"></a></div>
</div>

<script>
	var whatsapp = document.getElementById("whatsapp");
	var whatsappSpan = document.querySelector("#drop_whatsapp_number span");
	var em = document.querySelector("#drop_whatsapp_number span em");

	var etiquette = document.querySelector("#etiquette");
	var socialIcon = document.querySelector("#social_icon");

	const copyBtn = document.querySelector("#drop_whatsapp_number span i");
    const textCopy = document.querySelector("#textCopy");

	var dropMenuNumber = document.getElementById("drop_whatsapp_number");

	whatsapp.addEventListener('click', () => {
		dropMenuNumber.classList.toggle("drop_whatsapp_number_open");
		whatsappSpan.classList.toggle("active");

		// se referme automatiquement après 5 secondes
		setTimeout(() => {
			dropMenuNumber.classList.remove("drop_whatsapp_number_open");
			whatsappSpan.classList.remove("active");
		}, 5000);
		
		// animation of the phone number
		// whatsappSpan.style.transition = "0.2s .5s ease!important";
	});

	etiquette.addEventListener('click', (e) => {
		socialIcon.classList.toggle("etiquette_toggle");
		dropMenuNumber.classList.remove("drop_whatsapp_number_open");

		// se referme si on utilise le scroll
		window.addEventListener("scroll", () => {
			socialIcon.classList.remove("etiquette_toggle");
			dropMenuNumber.classList.remove("drop_whatsapp_number_open");
		});
	});

    copyBtn.addEventListener("click", () => {
		textCopy.select();
		if(document.execCommand("copy")){
			copyBtn.classList.add("fa-check");
			copyBtn.classList.remove("fa-copy");
			copyBtn.style.background = "#2DCDA7";
			copyBtn.style.color = "#fff";

			em.textContent = "copie :)";
		}
		else{
			copyBtn.classList.add("fa-close");
			copyBtn.style.fontColor = "red";
			copyBtn.classList.remove("fa-copy");
			copyBtn.style.background = "red";
			copyBtn.style.color = "#fff";

			em.textContent = "erreur de copy :(";
		}

      setTimeout(() => {
		document.getSelection().removeAllRanges();
		copyBtn.classList.remove("fa-check");
		copyBtn.classList.add("fa-copy");
		copyBtn.style.background = "";
		copyBtn.style.color = "";

		em.textContent = "+237 682 69 67 34";
      }, 2000);
    });
</script>
