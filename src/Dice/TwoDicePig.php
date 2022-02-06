<?php

declare(strict_types=1);

namespace Adja20\Dice;

use Adja20\Dice\Dice;
use Adja20\Dice\GraphicalDice;
use Adja20\Dice\DiceHand;

use function Adja20\Functions\{
    renderView,
    url
};

/**
 * Class TwoDicePig.
 */
class TwoDicePig
{
    public function playTwoDicePig(): void
    {
        $graphicalDiceSides = 6;
        $diceHand = "";

        $die = new Dice();
        $graphicalDie = new GraphicalDice();

        if (!isset($_SESSION["pigRollScore"])) {
            $_SESSION["pigRollScore"] = 0;
        }

        if (!isset($_SESSION["pigRounds"])) {
            $_SESSION["pigRounds"] = 0;
        }

        if (!isset($_SESSION["pigTotalScore"])) {
            $_SESSION["pigTotalScore"] = 0;
        }

        if (!isset($_SESSION["rollMessage"])) {
            $_SESSION["rollMessage"] = "";
        }

        if (!isset($_SESSION["yourName"])) {
            $_SESSION["yourName"] = "Unnamed";
        }

        $die->roll(6);

        $graphicalDie->roll($graphicalDiceSides);

        $diceHand = new DiceHand(2);

        $diceHand->roll(6);

        $lastRollArray = $diceHand->getLastRollArray();
        $lastrollArraySum = $lastRollArray[0] + $lastRollArray[1];

        $_SESSION["rollButtonStatus"] = "enabled";
        $_SESSION["pigRollScore"] = $_SESSION["pigRollScore"] + $lastrollArraySum;

        if ($lastRollArray[0] == 1 && $lastRollArray[1] != 1) {
            $_SESSION["pigRollScore"] = 0;
            $_SESSION["pigRounds"] = $_SESSION["pigRounds"] + 1;
            $_SESSION["rollMessage"] = "Too bad! You rolled a 1. Your current rollscore has been wiped and a round has been added.";
            $_SESSION["buttonStatus"] = "disabled";
        } else if ($lastRollArray[0] != 1 && $lastRollArray[1] == 1) {
            $_SESSION["pigRollScore"] = 0;
            $_SESSION["pigRounds"] = $_SESSION["pigRounds"] + 1;
            $_SESSION["rollMessage"] = "Too bad! You rolled a 1. Your current rollscore has been wiped and a round has been added.";
            $_SESSION["buttonStatus"] = "disabled";
        } else if ($lastRollArray[0] == 1 && $lastRollArray[1] == 1) {
            $_SESSION["pigRollScore"] = 0;
            $_SESSION["pigRounds"] = $_SESSION["pigRounds"] + 1;
            $_SESSION["pigTotalScore"] = 0;
            $_SESSION["rollMessage"] = "What a shame! You rolled two 1's. Your current rollscore AND the total score have been wiped and a round has been added.";
            $_SESSION["buttonStatus"] = "disabled";
        } else if ($lastRollArray[0] == 6 && $lastRollArray[1] == 6) {
            $_SESSION["pigTotalScore"] = $_SESSION["pigTotalScore"] + $_SESSION["pigRollScore"];
            $_SESSION["pigRollScore"] = 0;
            $_SESSION["rollMessage"] = "Congratulations! You rolled two 6's. Your current rollscore has been saved to the total score and NO round has been added.";
            $_SESSION["buttonStatus"] = "disabled";
        } else {
            $_SESSION["rollMessage"] = "";
        }
        $finalScore = $_SESSION["pigTotalScore"] + $_SESSION["pigRollScore"];

        if (intval($finalScore) >= 100) {
            $_SESSION["rollMessage"] = "Congratulations! You've finished the game. Your amount of rounds have been saved to the highscore-board. Start a new game to play again!";
            $_SESSION["buttonStatus"] = "disabled";
            $_SESSION["rollButtonStatus"] = "disabled";
            $_SESSION["pigRounds"] = $_SESSION["pigRounds"] + 1;
        }

        $_SESSION["dieLastRoll"] = $die->getLastRoll();
        $_SESSION["graphicalDieLastRoll"] = $graphicalDie->getLastRoll();
        $_SESSION["class"] = $graphicalDie->graphic();
        $_SESSION["diceHandRoll"] = $diceHand->getLastRoll();
        $_SESSION["diceHandClass"] = $diceHand->getLastClass();
    }
}
