<?php

require_once __DIR__ . "/../bin/bootstrap.php";

$pigHighscoreRepository = $entityManager->getRepository('\Adja20\PigHighscore\PigHighscore');
$pigHighscores = $pigHighscoreRepository->findBy(array(), array('pigHighscore' => 'ASC'));

?>

<h1>Pig Highscore</h1>

<?php
$i = 1;
if ($pigHighscores) {
    foreach ($pigHighscores as $pigHighscore) {
            echo "<p>------------------------------------------</p>";
            echo "<p style='font-weight:bold'>Placement: " . $i . "</p><p>ID: " . $pigHighscore->getId() . " <br>Name: " . $pigHighscore->getName() . " <br>Roundscore (rounds played): " . $pigHighscore->getPigHighscore() . "</p>";
            $i = $i + 1;
    }
} else {
    echo "No highscore!\n";
}
