<?php

use Adja20\Highscore\Highscore;

require_once __DIR__ . "/bootstrap.php";

$newName = $_SESSION["yourName"];
$newHighscore = $_SESSION["yatzyTotalScore"];

$highscore = new Highscore();
$highscore->setName($newName);
$highscore->setHighscore($newHighscore);

$entityManager->persist($highscore);
$entityManager->flush();
