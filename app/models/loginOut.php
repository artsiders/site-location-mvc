<?php
session_destroy(); //destruction de la session de l'utilisateur connecté
header("Location:".HOST."login");

