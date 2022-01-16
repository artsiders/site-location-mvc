<link rel="stylesheet" type="text/css" href="<?= ASSETS ?>css/card.css">

<div class="content_card">
	<?php
	require_once CONTROLER . 'housesControler.php';
	?>

	<?php foreach ($result as $result) : ?>
		<div class="card">
			<h2 class="category"><?= $result['categorie'] ?></h2>
			<div class="image_box">
				<img src="<?= ASSETS; ?>images/<?= $result['photoHouse1'] ?>" data-id="<?= $result['idHouse'] ?>" alt="une maison">
				<div class="price"><?= $result['price'] ?> F/mois</div>
			</div>
			<div class="content">
				<p>ville : <strong><?= $result['city'] ?></strong></p>
				<br>
				<p>
					<?= $result['description'] ?>
				</p>
			</div>
			<center><a data-id="<?= $result['idHouse'] ?>" class="btn_more">afficher plus...</a></center>
		</div>
	<?php endforeach; ?>

</div>
<!-- pagination -->
<nav class="switchPages">
	<div class="pagination">
		<span class="">
			<a href="./?action=home&page=<?= $currentPage - 1 ?>" class="<?= ($currentPage == 1) ? "disabled" : "" ?>">
				<button class="btnSwitchPages"><i class="fa fa-chevron-circle-left"></i></button>
			</a>
		</span>
		<span class="infoPage">
			<?php echo $currentPage .  " / " . $pages; ?>
		</span>
		<span class="">
			<a href="./?action=home&page=<?= $currentPage + 1 ?>" class="<?= ($currentPage == $pages) ? "disabled" : "" ?>">
				<button class="btnSwitchPages"><i class="fa fa-chevron-circle-right"></i></button>
			</a>
		</span>
	</div>
</nav>

<script src="<?= ASSETS; ?>js/jquery.js"></script>
<script src="<?= ASSETS; ?>js/ajax.js"></script>
<script>
	houseDetails();

	// var card = document.querySelector(".card");
	// var imageBox = document.querySelector(".image_box");
	// card.addEventListener("click", () => {
	// 	imageBox.classList.toggle('content_hover')
	// });
</script>