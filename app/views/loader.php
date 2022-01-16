<link rel="stylesheet" href="<?= ASSETS;?>css/loader.css">

<div id="content_load">
	<p class="loading">chargement</p>
	<!-- <i id="load" class="fa fa-spinner fa-spin"></i> -->
	<img id="load" src="<?= ASSETS;?>images/loading.gif" alt="">
</div>
<script>
	// set time load of the page
	// setTimeout(() => {
	// 	var contentLoad = document.querySelector('#content_load');
	// 	var contentLoadI = document.querySelector('#load');
	// 	contentLoad.classList.add("load_hide");
	// 	contentLoadI.style.display = "none";
	// 	setTimeout(() => { contentLoad.style.display = "none";},1000);
	// },1400);

	function ready(){
		var contentLoad = document.querySelector('#content_load');
		var contentLoadI = document.querySelector('#load');
		contentLoad.classList.add("load_hide");
		contentLoadI.style.display = "none";

		setTimeout(() => { contentLoad.style.display = "none";},1000);
	}

</script>
