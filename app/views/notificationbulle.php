<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= ASSETS;?>css/notificationbulle.css">

<div class="content_bulle">
    <div id="bulle">
        <!-- cette div apparaite en cas d'erreur -->
        <div class="" id="boxMsg">
            pas de notification pour le moment
        </div>
        <i class="fa fa-bell-o"></i>
    </div>
</div>


<script>
    // ouverture et fermeture manuel de la bulle de notification
    var bulle = document.getElementById("bulle");
    var boxMsg = document.querySelector("#boxMsg");
    var bulleIcon = document.querySelector("#bulle i");

    var bulleOpen = 0;
    bulle.addEventListener("click", () => {
        if(bulleOpen == 0){
            boxMsg.style.display = "block";
            bulleIcon.classList.toggle("fa-close");
            bulleIcon.classList.toggle("fa-bell-o");
            bulleOpen++;
        } else {
            boxMsg.style.display = "none";
            bulleIcon.classList.toggle("fa-close");
            bulleIcon.classList.toggle("fa-bell-o");
            bulleOpen--;
        }
        bulle.classList.toggle("bulleHover");
        
    });
    // END__________________________________________________________
</script>