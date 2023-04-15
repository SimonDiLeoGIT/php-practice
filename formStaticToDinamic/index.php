<?php

    $title = htmlspecialchars($_GET['nombre'] ?? "PAW");

    $menu = [

        [
            "href" => "/",
            "name" => "Home"
        ],
        
        [
            "href" => "/about",
            "name" => "Who We Are"
        ],
        
        [
            "href" => "/services",
            "name" => "Services"
        ],

    ];


    require 'index_view.php';

?>