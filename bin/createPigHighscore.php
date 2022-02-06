<?php

use Adja20\PigHighscore\PigHighscore;

require_once __DIR__ . "/bootstrap.php";

$newName = $_SESSION["yourName"];
$newPigHighscore = $_SESSION["pigRounds"];

$pigHighscore = new PigHighscore();
$pigHighscore->setName($newName);
$pigHighscore->setPigHighscore($newPigHighscore);

$entityManager->persist($pigHighscore);
$entityManager->flush();
