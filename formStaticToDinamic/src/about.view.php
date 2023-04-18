<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
</head>
<body>
    <header>
        <h1>
            Who We Are
        </h1>

        <nav>
            <ul>
                <?php foreach ($menu as $item) : ?>
                    <li>
                        <a href="<?= $item["href"]?>" ><?= $item["name"] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

    </header>

    <main>
        <?= $main ?>
    </main>
</body>
</html>