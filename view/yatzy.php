<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

require_once __DIR__ . "/../bin/bootstrap.php";

use function Adja20\Functions\url;

$header = $header ?? null;
$message = $message ?? null;
$action = $action ?? null;
$url = url("/yatzy/destroy");
$lastroll0 = $lastroll0 ?? null;
$lastroll1 = $lastroll1 ?? null;
$lastroll2 = $lastroll2 ?? null;
$lastroll3 = $lastroll3 ?? null;
$lastroll4 = $lastroll4 ?? null;
$yatzyDiceHandRoll = $yatzyDiceHandRoll ?? null;
$diceHandClass = $diceHandClass ?? null;
$diceHandRollSum = $diceHandRollSum ?? null;
$yatzyDiceHandRollGraphic = $yatzyDiceHandRollGraphic ?? null;
$bonus = $bonus ?? null;
$yatzyTotalScore = $yatzyTotalScore ?? null;
$buttonValue = $buttonValue ?? null;
$checkboxStatus = $checkboxStatus ?? null;
$yourName = $yourName ?? null;

if ($_SESSION["scoreIndex"] == 6) {
    require_once __DIR__ . "/../bin/createHighscore.php";
}


?><h1><?= $header ?></h1>

<p>You have rolled <?= $_SESSION["rollQueue"] ?> of 3 rolls for <?= $_SESSION["scoreIndexMessage"] ?></p>
<p><?= $message ?></p>

<form method="post" action="<?= $action ?>">
    <p>
        <input type="text" name="yourName" value='<?= $yourName ?>'>
        <p class="dice-utf8">
        <input type="checkbox" name="roll1" value="0" <?= $checkboxStatus ?>>
        <?= $yatzyDiceHandRoll[0] ?> <?= $yatzyDiceHandRollGraphic[0] ?></p>

        <p class="dice-utf8">
        <input type="checkbox" name="roll2" value="0" <?= $checkboxStatus ?>>
        <?= $yatzyDiceHandRoll[1] ?> <?= $yatzyDiceHandRollGraphic[1] ?></p>

        <p class="dice-utf8">
        <input type="checkbox" name="roll3" value="0" <?= $checkboxStatus ?>>
        <?= $yatzyDiceHandRoll[2] ?> <?= $yatzyDiceHandRollGraphic[2] ?></p>

        <p class="dice-utf8">
        <input type="checkbox" name="roll4" value="0" <?= $checkboxStatus ?>>
        <?= $yatzyDiceHandRoll[3] ?> <?= $yatzyDiceHandRollGraphic[3] ?></p>

        <p class="dice-utf8">
        <input type="checkbox" name="roll5" value="0" <?= $checkboxStatus ?>>
        <?= $yatzyDiceHandRoll[4] ?> <?= $yatzyDiceHandRollGraphic[4] ?></p>
    </p>

    <p>
        <input type="submit" value="<?= $buttonValue ?>">
        <a href="<?= $url ?>">Reset</a>
    </p>

    <p>_________</p>
    <p>Ones: <?= $_SESSION["yatzyScore"][0] ?></p>
    <p>Twos: <?= $_SESSION["yatzyScore"][1] ?></p>
    <p>Threes: <?= $_SESSION["yatzyScore"][2] ?></p>
    <p>Fours: <?= $_SESSION["yatzyScore"][3] ?></p>
    <p>Fives: <?= $_SESSION["yatzyScore"][4] ?></p>
    <p>Sixes: <?= $_SESSION["yatzyScore"][5] ?></p>
    <p>__________</p>
    <p>Sum: <?= $diceHandRollSum ?></p>
    <p>Bonus: <?= $bonus ?></p>
    <p>TOTAL: <?= $yatzyTotalScore ?></p>

</form>