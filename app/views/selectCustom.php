<!-- invisible pour l'utilisateur ------------------------------------- -->
<input value="" style="display: none;" type="text" name="ville" id="ville">
<input value="" style="display: none;" type="text" name="categories" id="categories">
<style>
.select{
	position: relative;
}
.select #select_value, #select_value_categories {
	/* width: 170px; */
	height: 36px;
	padding: 0 12px;
    margin-bottom: 20px;
    border-radius: 3px;
    background: var(--white);
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
}
.select #select_value i, #select_value_categories i{
	transition: transform .5s;
}
.select #list_option, #list_option_categories{
	width: 100%;
    background: var(--white);
    border-radius: 5px;
    overflow-y: scroll;
    height: 200px;
    max-height: 200px;
	border: 8px solid var(--white2);
    position: absolute;
    animation: showOp 0.1s ease-in-out;
}
.options{
	width: 100%;
	cursor: pointer;
	padding: 12px 0 12px 40px;
	position: relative;
	overflow: hidden;
}
.options:hover{
	background: var(--hover);
}
.options i{
	width: 25px;
	position: absolute;
	top: 12px;
	left: 12px;	
	pointer-events: none;
}
.options p{
	pointer-events: none;
}
.select .hide{
	visibility: hidden;
}
.rotate{
	transform: rotate(180deg)!important;
}
</style>
<!-- END ----------------------------------------------------- -->


<?php require MODEL."City.php"; ?>
<?php require MODEL."Categorie.php"; ?>
<?php //print_r($_POST); exit;
$city = new City;
$resultCity = $city->getCity();
?> 
<!-- VILLE ------------------------------------------------ -->
<div class="select">
    <div id="select_value">
        <span id="select_text">ville</span>
        <i class="fa fa-caret-down" id="arrow_ville"></i>
    </div>

    <div id="list_option" class="hide">
    <?php foreach ($resultCity as $key => $resultCity) : ?>
        <div class="options" data-key="<?= $resultCity['city']; ?>">
            <i class="fa fa-map-marker"></i>
            <p><?= $resultCity['city'];?></p>
        </div>
    <?php endforeach; ?>
    </div>

</div>
<?php 
$categorie = new Categorie;
$resultCateg = $categorie->getCategorie();
?>  
<!-- CATEGORIES ------------------------------------------------ -->
<div class="select">
    <div id="select_value_categories">
        <span id="select_text_categories">categories</span>
        <i class="fa fa-caret-down" id="arrow_catgories"></i>
    </div>

    <div id="list_option_categories" class="hide">
    <?php foreach ($resultCateg as $key => $resultCateg) : ?>
        <div class="options" data-key="<?= $resultCateg['categorie']; ?>">
            <i class="fa fa-map-marker"></i>
            <p><?= $resultCateg['categorie'];?></p>
        </div>
    <?php endforeach; ?>
    
    </div>
</div>

<script>
    // variable declaration__________________________________________________
	var ville = document.querySelector("#ville");
	var categories = document.querySelector("#categories");

	var selectValue = document.querySelector("#select_value");
	var selectValueCateg = document.querySelector("#select_value_categories");

	var arrow = document.querySelector("#arrow_ville");
	var arrowCateg = document.querySelector("#arrow_catgories");

	var selectText = document.querySelector("#select_text");
	var selectTextCateg = document.querySelector("#select_text_categories");

	var listOption = document.querySelector("#list_option");
	var listOptionCateg = document.querySelector("#list_option_categories");
	// END ___________________________________________________________________


	// my select customise "VILLE"__________________________________________________
    selectValue.addEventListener("click", () => {
        listOption.classList.toggle("hide");
        arrow.classList.toggle("rotate");
    });
    listOption.addEventListener("click", (e) => {
        // console.log(e.target.dataset.key);
        var key = e.target.dataset.key;
        listOption.classList.toggle("hide");
        switch (key) {
            <?php 
			$resultCity = $city->getCity();
			?> 
            <?php foreach ($resultCity as $key => $resultCity) : ?>
                case "<?= $resultCity['city'] ?>":
                    selectText.innerHTML = key;
                    ville.value = <?= $resultCity['idCity']; ?>;
                    break;
            <?php endforeach; ?>
        }
	//erreur fictive de vs code......................
     <?= "})"?>;


	// my select customise "CATEGORIES"__________________________________________________
	selectValueCateg.addEventListener("click", () => {
		listOptionCateg.classList.toggle("hide");
		arrowCateg.classList.toggle("rotate");
	});

	listOptionCateg.addEventListener("click", (e) => {
		// console.log(e.target.dataset.key);
		var key = e.target.dataset.key;
		switch(key){

			<?php 
			$resultCateg = $categorie->getCategorie();
			?> 
            <?php foreach ($resultCateg as $key => $resultCateg) : ?>
                case "<?= $resultCateg['categorie'] ?>":
                    selectTextCateg.innerHTML = key;
                    categories.value = <?= $resultCateg['idCategorie']; ?>;
                    break;
            <?php endforeach; ?>

		}
	//erreur fictive de vs code.............................
<?= "listOptionCateg.classList.toggle('hide');
	});
</script>"

?>