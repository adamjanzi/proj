<?php

require_once __DIR__ . "/../bin/bootstrap.php";

$highscoreRepository = $entityManager->getRepository('\Adja20\Highscore\Highscore');
$highscores = $highscoreRepository->findBy(array(), array('highscore' => 'DESC'));

?>

<h1>Yatzy Highscore</h1>

<?php

if ($highscores) {
    foreach ($highscores as $highscore) {
            echo "<p>ID: " . $highscore->getId() . " | Name: " . $highscore->getName() . " | Score: " . $highscore->getHighscore() . "</p>";
            echo "<p>------------------------------------------</p>";
    }
} else {
    echo "No highscore\n";
}
