
<h1 class="result-title">Résultats de la recherche : <span><?= $_GET['search'] ?></span></h1>

<section class="results">
    <?php foreach ($searchMovies as $oneMovie) : ?>
        <a href="<?= $router->generate('movie', ['id' => $oneMovie->getId()]) ?>" class="movie-result">
            <img src="https://image.tmdb.org/t/p/original/<?= $oneMovie->getPoster_url() ?>" alt="<?= $oneMovie->getTitle() ?>">
            <h3>
                <?= $oneMovie->getTitle() ?>
            </h3>
        </a>
    <?php endforeach ?>
</section>