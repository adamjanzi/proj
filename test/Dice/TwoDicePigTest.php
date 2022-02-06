<?php

namespace Adja20\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class TwoDicePig.
 */
class TwoDicePigTest extends TestCase
{
    /**
     * Verify the twodicepig object
     * @runInSeparateProcess
     */
    public function testTwoDicePig()
    {
        $twoDicePig = new TwoDicePig();
        $this->assertInstanceOf("\Adja20\Dice\TwoDicePig", $twoDicePig);
    }

    /**
     * Verify the twodicepih rolls are Int.
     * @runInSeparateProcess
     */
    public function testTwoDicePigIsInt()
    {
        $twoDicePig = new TwoDicePig();
        $twoDicePig->playTwoDicePig();
        $this->assertIsInt($_SESSION["dieLastRoll"]);
        $this->assertIsInt($_SESSION["graphicalDieLastRoll"]);
    }

    /**
     * Verify the twodicepig gives the desired result based on the rollvalues.
     * @runInSeparateProcess
     */
    public function testTwoDicePigRollvalues()
    {
        $twoDicePig = new TwoDicePig();
        $_SESSION["rollMessage"] = "Blabla";
        $_SESSION["diceSides"][0] = 3;
        $_SESSION["diceSides"][1] = 2;
        $_SESSION["buttonStatus"] = "enabled";
        $twoDicePig->playTwoDicePig();
        $this->assertEquals($_SESSION["rollMessage"], "");
        $this->assertEquals($_SESSION["buttonStatus"], "enabled");

        $_SESSION["rollMessage"] = "Blabla";
        $_SESSION["buttonStatus"] = "enabled";
        $_SESSION["diceSides"][0] = 1;
        $_SESSION["diceSides"][1] = 2;
        $_SESSION["pigRollScore"] = 10;
        $_SESSION["pigRounds"] = 2;
        $_SESSION["pigTotalScore"] = 0;
        $twoDicePig->playTwoDicePig();
        $this->assertEquals($_SESSION["rollMessage"], "Too bad! You rolled a 1. Your current rollscore has been wiped and a round has been added.");
        $this->assertEquals($_SESSION["pigRollScore"], 0);
        $this->assertEquals($_SESSION["pigRounds"], 3);
        $this->assertEquals($_SESSION["pigTotalScore"], 0);
        $this->assertEquals($_SESSION["buttonStatus"], "disabled");

        $_SESSION["rollMessage"] = "Blabla";
        $_SESSION["buttonStatus"] = "enabled";
        $_SESSION["diceSides"][0] = 5;
        $_SESSION["diceSides"][1] = 1;
        $_SESSION["pigRollScore"] = 10;
        $_SESSION["pigRounds"] = 2;
        $_SESSION["pigTotalScore"] = 0;
        $twoDicePig->playTwoDicePig();
        $this->assertEquals($_SESSION["rollMessage"], "Too bad! You rolled a 1. Your current rollscore has been wiped and a round has been added.");
        $this->assertEquals($_SESSION["pigRollScore"], 0);
        $this->assertEquals($_SESSION["pigRounds"], 3);
        $this->assertEquals($_SESSION["pigTotalScore"], 0);
        $this->assertEquals($_SESSION["buttonStatus"], "disabled");

        $_SESSION["rollMessage"] = "Blabla";
        $_SESSION["buttonStatus"] = "enabled";
        $_SESSION["diceSides"][0] = 1;
        $_SESSION["diceSides"][1] = 1;
        $_SESSION["pigRollScore"] = 10;
        $_SESSION["pigRounds"] = 2;
        $_SESSION["pigTotalScore"] = 5;
        $twoDicePig->playTwoDicePig();
        $this->assertEquals($_SESSION["rollMessage"], "What a shame! You rolled two 1's. Your current rollscore AND the total score have been wiped and a round has been added.");
        $this->assertEquals($_SESSION["pigRollScore"], 0);
        $this->assertEquals($_SESSION["pigRounds"], 3);
        $this->assertEquals($_SESSION["pigTotalScore"], 0);
        $this->assertEquals($_SESSION["buttonStatus"], "disabled");

        $_SESSION["rollMessage"] = "Blabla";
        $_SESSION["buttonStatus"] = "enabled";
        $_SESSION["diceSides"][0] = 6;
        $_SESSION["diceSides"][1] = 6;
        $_SESSION["pigRollScore"] = 10;
        $_SESSION["pigRounds"] = 2;
        $_SESSION["pigTotalScore"] = 5;
        $twoDicePig->playTwoDicePig();
        $this->assertEquals($_SESSION["rollMessage"], "Congratulations! You rolled two 6's. Your current rollscore has been saved to the total score and NO round has been added.");
        $this->assertEquals($_SESSION["pigRollScore"], 0);
        $this->assertEquals($_SESSION["pigRounds"], 2);
        $this->assertEquals($_SESSION["pigTotalScore"], 27);
        $this->assertEquals($_SESSION["buttonStatus"], "disabled");

        $_SESSION["rollMessage"] = "Blabla";
        $_SESSION["buttonStatus"] = "enabled";
        $_SESSION["rollButtonStatus"] = "enabled";
        $_SESSION["pigRollScore"] = 10;
        $_SESSION["pigRounds"] = 2;
        $_SESSION["pigTotalScore"] = 100;
        $twoDicePig->playTwoDicePig();
        $this->assertEquals($_SESSION["rollMessage"], "Congratulations! You've finished the game. Your amount of rounds have been saved to the highscore-board. Start a new game to play again!");
        $this->assertEquals($_SESSION["pigRounds"], 3);
        $this->assertEquals($_SESSION["buttonStatus"], "disabled");
        $this->assertEquals($_SESSION["rollButtonStatus"], "disabled");
    }
}
