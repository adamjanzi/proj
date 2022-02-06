<?php

declare(strict_types=1);

namespace Adja20\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the controller TwoDicePigController.
 */
class ControllerTwoDicePigControllerTest extends TestCase
{
    /**
     * Try to create the controller class.
     * @runInSeparateProcess
     */
    public function testCreateTheControllerClass()
    {
        $controller = new TwoDicePigController();
        $this->assertInstanceOf("\Adja20\Controller\TwoDicePigController", $controller);
    }

    /**
     * Check that the controller returns a response.
     * @runInSeparateProcess
     */
    public function testControllerReturnsResponse()
    {
        $controller = new TwoDicePigController();
        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->view();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check the controller process action.
     * @runInSeparateProcess
     */
    public function testControllerProcessAction()
    {
        session_start();
        $_POST["yourName"] = "Hej";
        $controller = new TwoDicePigController();
        $controller->process();
        $this->assertEquals($_SESSION["yourName"], "Hej");
    }

    /**
     * Check the controller newround action
     * $runInSeparateProcess
     */
    public function testControllerNewroundAction()
    {
        $_SESSION["pigTotalScore"] = 1;
        $_SESSION["pigRollScore"] = 10;
        $_SESSION["pigRounds"] = 1;
        $exp = "\Psr\Http\Message\ResponseInterface";
        $controller = new TwoDicePigController();
        $res = $controller->newround();
        $this->assertInstanceOf($exp, $res);
        $this->assertEquals($_SESSION["pigTotalScore"], 11);
        $this->assertEquals($_SESSION["pigRollScore"], 0);
        $this->assertEquals($_SESSION["pigRounds"], 2);
        $this->assertEquals($_SESSION["buttonStatus"], "disabled");
    }

    /**
     * Check the controller destroy action.
     * @runInSeparateProcess
     */
    public function testControllerDestroyAction()
    {
        session_start();
        $controller = new TwoDicePigController();

        $_SESSION = [
            "key" => "value"
        ];

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->destroy();
        $this->assertInstanceOf($exp, $res);
        $this->assertEmpty($_SESSION);
    }
}
