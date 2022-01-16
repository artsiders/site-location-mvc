$(function () {
    $('#loginForm').submit((e) => {
        // e.preventDefault();

        //je stocke les donnée du formulaire dans la variable "postData"
        var postData = $("#loginForm").serialize();
        // le code ajax en jquery
        $.ajax({
            type: "POST",
            url: 'app/models/loginProcess.php',
            data: postData,
            dataType: 'json',
            success: function(result) {
                // code...
            }

        })
    });
});