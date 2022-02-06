<?php

declare(strict_types=1);

use function Adja20\Functions\url;

$header = $header ?? null;
$message = $message ?? null;
$action = $action ?? null;
$saveAction = $saveAction ?? null;
$diceHandRoll = $diceHandRoll ?? "Nothing yet!";
$diceHandClass = $diceHandClass ?? null;
$pigRollScore = $pigRollScore ?? 0;
$pigRounds = $pigRounds ?? 0;
$pigTotalScore = $pigTotalScore ?? 0;
$buttonStatus = $buttonStatus ?? null;
$rollMessage = $rollMessage ?? null;
$rollButtonStatus = $rollButtonStatus ?? null;
$yourName = $yourName ?? null;
$url = url("/twodicepig/destroy");

if (($_SESSION["pigTotalScore"] + $_SESSION["pigRollScore"]) >= 100) {
    require_once __DIR__ . "/../bin/createPigHighscore.php";
}

?><h1><?= $header ?></h1>

<p><?= $message ?></p>

<form method="post" action="<?= $action ?>">
    <p>
        <input type="text" name="yourName" value='<?= $yourName ?>'>
    </p>
    <p>
        <input type="submit" value="Press to roll" class="pigbuttons" <?= $rollButtonStatus ?>>
    </p>
</form>

<form method="post" action="<?= $saveAction ?>">
    <p>
        <input type="submit" value="Press to save score" class="pigbuttons"<?= $buttonStatus ?>>
    </p>
</form>

<p> <?= $rollMessage ?> </p>

<p>You rolled: <?= $diceHandRoll ?></p>

<p class="dice-utf8"><?= $diceHandClass ?></p>

<p>Current rollscore: <?= $pigRollScore ?></p>
<p>Amount of rounds: <?= $pigRounds ?></p>
<p>Total Score: <?= $pigTotalScore ?></p>

<a href="<?= $url ?>" class="pigbuttons">Start a new game</a>
