<?php

require_once __DIR__ . "/../bin/bootstrap.php";


$pigHighscoreRepository = $entityManager->getRepository('\Adja20\PigHighscore\PigHighscore');
$pigHighscores = $pigHighscoreRepository->findAll();

echo "Pig Highscore\n--------------------\n";

if ($pigHighscores) {
    foreach ($pigHighscores as $pigHighscore) {
        echo sprintf("%2d - %s - %u\n",
            $pigHighscore->getId(),
            $pigHighscore->getName(),
            $pigHighscore->getPigHighscore(),
        );
    }
} else {
    echo " (empty)\n";
}

