<?php
    dump($viewData);
?>
<div class="movie-wrapper">

    <section class="poster">
        <img src="https://image.tmdb.org/t/p/original//<?= $movie->getPoster_url() ?>" alt="Le voyage de Chihiro">
        <i class="fa-regular fa-circle-play"></i>
    </section>
    <section class="details">
        <h1 class="movie-title"><?= $movie->getTitle() ?></h1>
        <div class="movie-meta">
            <div class="date"><?= $movie->getRelease_date() ?></div>
            <div class="rating"><i class="fa-solid fa-star"></i> <span><?= $movie->getRating() ?></span> / 10</div>
        </div>
        <div class="movie-synopsis">
            <?= $movie->getSynopsis() ?>
        </div>
        <div class="crew">
            <div class="real">
                <h2><i class="fa-solid fa-film"></i> Réalisateur</h2>
                <img src="https://image.tmdb.org/t/p/original/<?=$director->getPicture_url() ?>" alt="<?= $director->getName() ?>">
                <h3><?= $director->getName() ?></h3>
            </div>
            <div class="composer">
                <h2><i class="fa-solid fa-music"></i> Compositeur</h2>
                <img src="https://image.tmdb.org/t/p/original/<?=$composer->getPicture_url() ?>" alt="<?= $composer->getName() ?>">
                <h3><?= $composer->getName() ?></h3>
            </div>
        </div>
        <div class="actors">
            <h2><i class="fa-solid fa-clapperboard"></i> Acteurs</h2>
            <ul>
                <?php foreach ($actors as $actor) : ?>
                    <li>
                        <img src="https://image.tmdb.org/t/p/original/<?= $actor->getPicture_url()?>" alt="<?= $actor->getName()?>">
                        <h3><?= $actor->getName()?></h3>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </section>
</div>