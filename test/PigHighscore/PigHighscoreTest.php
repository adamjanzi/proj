<?php

namespace Adja20\PigHighscore;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class PigHighscore.
 */
class PigHighscoreTest extends TestCase
{
    /**
     * Verify the pighighscore object
     */
    public function testPigHighscore()
    {
        $pigHighscore = new PigHighscore();
        $this->assertInstanceOf("\Adja20\PigHighscore\PigHighscore", $pigHighscore);
    }

    /**
     * Verify the name return.
     */
    public function testGetName()
    {
        $pigHighscore = new PigHighscore();
        $pigHighscore->setName("Testname");
        $res = $pigHighscore->getName();
        $exp = "Testname";
        $this->assertEquals($res, $exp);
    }

    /**
     * Verify the pighighscore return.
     */
    public function testGetPigHighscore()
    {
        $pigHighscore = new PigHighscore();
        $pigHighscore->setPigHighscore(10);
        $res = $pigHighscore->getPigHighscore();
        $exp = 10;
        $this->assertEquals($res, $exp);
    }
}
