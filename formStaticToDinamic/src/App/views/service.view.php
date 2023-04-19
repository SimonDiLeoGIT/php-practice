<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'parts/head.view.php';?>
</head>
<body>
    <header>
        <h1>
            Services
        </h1>

        <?php

            require 'parts/nav.view.php'

        ?>
        <?php if ($procesado) : ?>
        <div class="notification">
            Su Petición fue procesada con éxito ...
        </div>
        <?php endif; ?>

    </header>

    <main>
        <?= $main ?>

        <form action="/services" method="POST">
            <label for="subject"><strong>Asunto (*)</strong></label>
            <input type="text" name="subject">
            <label for="email"><strong>Correo (*)</strong></label>
            <input type="email" name="email">
            <label for="description"><strong>Descripción (*)</strong></label>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
            <input type="submit" name="sbmit" value="Enviar">
        </form>
        
    </main>
</body>
</html>