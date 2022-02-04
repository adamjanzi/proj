<?php

require_once __DIR__ . "/../bin/bootstrap.php";


$highscoreRepository = $entityManager->getRepository('\Adja20\Highscore\Highscore');
$highscores = $highscoreRepository->findAll();

echo "All highscores\n--------------------\n";

if ($highscores) {
    foreach ($highscores as $highscore) {
        echo sprintf("%2d - %s - %u\n",
            $highscore->getId(),
            $highscore->getName(),
            $highscore->getHighscore(),
        );
    }
} else {
    echo " (empty)\n";
}

