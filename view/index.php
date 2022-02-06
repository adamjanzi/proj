<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

use function Adja20\Functions\url;

$header = $header ?? null;
$message = $message ?? null;
$url = url("/twodicepig/destroy");

?><h1><?= $header ?></h1>

<p><?= $message ?></p>

<p>You can roll two dice at the same time.<br>
    The result of each roll will be added with previous rolls as the current rollscore.<br>
    You may at any time save the current rollscore to the total score, which will reset the current rollscore and add one round to your round count.<br>
    The goal is to reach a total score of 100 or above, with as few amount of rounds added to your count as possible.<br>
    Once you have reached a total score of 100 or above, your score will be saved to the highscore-list. <br>
    The player with least amount of rounds added to their round count will be at the top of the list. <br>
    <br>
    - If one of the dice shows a 1, the current rollscore will be reset and one round will be added to your round count.<br>
    - If both dice show a 1, the current rollscore AND the total score will be reset and one round will be added to your round count.<br>
    - If both dice show a 6, the current rollscore is saved to the total score and NO round will be added to your round count.<br>
    <br>
    Have fun!</p>

    <a href="<?= $url ?>" class="pigbuttons">Play</a>
