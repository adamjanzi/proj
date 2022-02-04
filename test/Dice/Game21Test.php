<?php

namespace Adja20\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Game21.
 */
class Game21Test extends TestCase
{
    /**
     * Verify the game21 object
     * @runInSeparateProcess
     */
    public function testGame21()
    {
        $game21 = new Game21();
        $this->assertInstanceOf("\Adja20\Dice\Game21", $game21);
    }

    /**
     * Verify the game21 rolls return Int
     * @runInSeparateProcess
     */
    public function testGame21IsInt()
    {
        $game21 = new Game21();
        $game21->playGame21();
        $this->assertIsInt($_SESSION["totalScore"]);
        $this->assertIsInt($_SESSION["computerTotalScore"]);
        $this->assertIsInt($_SESSION["roundScore"]);
        $this->assertIsInt($_SESSION["computerRoundScore"]);
        $this->assertIsInt($_SESSION["dieLastRoll"]);
        $this->assertIsInt($_SESSION["graphicalDieLastRoll"]);
        $this->assertIsInt($_SESSION["diceHandRollSum"]);
    }

    /**
     * Verify the game21 gives the desired results with controlled inputs.
     * @runInSeparateProcess
     */
    public function testGame21IsSet()
    {
        $game21 = new Game21();
        $_SESSION["numberOfFaces"] = 1;
        $_SESSION["numberOfDice"] = 3;
        $game21->playGame21();
        $totalScore = $_SESSION["totalScore"];
        $dieLastRoll = $_SESSION["dieLastRoll"];
        $graphicalDieLastRoll = $_SESSION["graphicalDieLastRoll"];
        $diceHandRoll = $_SESSION["diceHandRoll"];
        $diceHandClass = $_SESSION["diceHandClass"];
        $diceHandRollSum = $_SESSION["diceHandRollSum"];

        $this->assertIsInt($totalScore);
        $this->assertIsInt($dieLastRoll);
        $this->assertIsInt($graphicalDieLastRoll);
        $this->assertIsInt($diceHandRollSum);
        $this->assertEquals(1, $dieLastRoll);
        $this->assertEquals("1, 1, 1", $diceHandRoll);
        $this->assertEquals("<i class='dice-1'></i><i class='dice-1'></i><i class='dice-1'></i>", $diceHandClass);
        $this->assertEquals(3, $diceHandRollSum);
        $this->assertEquals(3, $totalScore);
    }

    /**
     * Verify that the game21 scores give the desired results upon player scoring less than 21.
     * @runInSeparateProcess
     */
    public function testGame21ScoresRoundUnder21()
    {
        $game21 = new Game21();
        $_SESSION["numberOfFaces"] = 1;
        $_SESSION["numberOfDice"] = 2;
        $game21->playGame21();
        $compTotalScore = $_SESSION["computerTotalScore"];
        $scoreMessage = $_SESSION["scoreMessage"];

        $scoreMessageExp = "";
        $compTotalScoreExp = 0;

        $this->assertEquals($scoreMessageExp, $scoreMessage);
        $this->assertEquals($compTotalScoreExp, $compTotalScore);
    }

    /**
     * Verify that the game21 scores give the desired results upon player scoring more than 21.
     * @runInSeparateProcess
     */
    public function testGame21ScoresRoundOver21()
    {
        $game21 = new Game21();
        $_SESSION["numberOfFaces"] = 1;
        $_SESSION["numberOfDice"] = 22;
        $game21->playGame21();
        $totalScore = $_SESSION["totalScore"];
        $compTotalScore = $_SESSION["computerTotalScore"];
        $scoreMessage = $_SESSION["scoreMessage"];
        $compRoundScore = $_SESSION["computerRoundScore"];

        $scoreMessageExp = "YOU LOST! Roll to start again.";
        $compRoundScoreExp = 1;
        $totalScoreExp = 0;
        $compTotalScoreExp = 0;

        $this->assertEquals($scoreMessageExp, $scoreMessage);
        $this->assertEquals($compRoundScoreExp, $compRoundScore);
        $this->assertEquals($totalScoreExp, $totalScore);
        $this->assertEquals($compTotalScoreExp, $compTotalScore);
    }

    /**
     * Verify that the game21 scores give the desired results upon player scoring 21.
     * @runInSeparateProcess
     */
    public function testGame21ScoresRound21()
    {
        $game21 = new Game21();
        $_SESSION["numberOfFaces"] = 1;
        $_SESSION["numberOfDice"] = 21;
        $game21->playGame21();
        $totalScore = $_SESSION["totalScore"];
        $compTotalScore = $_SESSION["computerTotalScore"];
        $scoreMessage = $_SESSION["scoreMessage"];
        $roundScore = $_SESSION["roundScore"];

        $scoreMessageExp = "CONGRATULATIONS! Roll to start again.";
        $roundScoreExp = 1;
        $totalScoreExp = 0;
        $compTotalScoreExp = 0;

        $this->assertEquals($scoreMessageExp, $scoreMessage);
        $this->assertEquals($roundScoreExp, $roundScore);
        $this->assertEquals($totalScoreExp, $totalScore);
        $this->assertEquals($compTotalScoreExp, $compTotalScore);
    }
}
