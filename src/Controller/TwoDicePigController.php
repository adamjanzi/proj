<?php

declare(strict_types=1);

namespace Adja20\Controller;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;
use Adja20\Dice\TwoDicePig;

use function Adja20\Functions\{
    destroySession,
    renderView,
    url
};

/**
 * Controller for the twodicepig route.
 */
class TwoDicePigController
{
    public function view(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();
        if (!isset($_SESSION["buttonStatus"])) {
            $_SESSION["buttonStatus"] = "disabled";
        }
        if (!isset($_SESSION["pigTotalScore"])) {
            $_SESSION["pigTotalScore"] = 0;
        }
        if (!isset($_SESSION["pigRollScore"])) {
            $_SESSION["pigRollScore"] = 0;
        }

        $data = [
            "header" => "Two-Dice Pig",
            "message" => "Insert your name: ",
            "action" => url("/twodicepig/process"),
            "saveAction" => url("/twodicepig/newround"),
            "diceHandRoll" => $_SESSION["diceHandRoll"] ?? "Nothing yet!",
            "diceHandClass" => $_SESSION["diceHandClass"] ?? null,
            "pigRollScore" => $_SESSION["pigRollScore"] ?? 0,
            "pigRounds" => $_SESSION["pigRounds"] ?? 0,
            "pigTotalScore" => $_SESSION["pigTotalScore"] ?? 0,
            "buttonStatus" => $_SESSION["buttonStatus"] ?? null,
            "rollMessage" => $_SESSION["rollMessage"] ?? null,
            "rollButtonStatus" => $_SESSION["rollButtonStatus"] ?? null,
            "yourName" => $_SESSION["yourName"] ?? null
        ];

        $body = renderView("layout/twodicepig.php", $data);

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }

    public function process(): ResponseInterface
    {
        $_SESSION["buttonStatus"] = "enabled";
        $callable = new TwoDicePig();
        $callable->playTwoDicePig();
        $_SESSION["yourName"] = $_POST["yourName"];
        $psr17Factory = new Psr17Factory();
        return $psr17Factory
            ->createResponse(301)
            ->withHeader("Location", url("/twodicepig"));
    }

    public function newround(): ResponseInterface
    {
        $_SESSION["buttonStatus"] = "disabled";
        $_SESSION["pigTotalScore"] = $_SESSION["pigTotalScore"] + $_SESSION["pigRollScore"];
        $_SESSION["pigRollScore"] = 0;
        $_SESSION["pigRounds"] = $_SESSION["pigRounds"] + 1;

        $psr17Factory = new Psr17Factory();
        return $psr17Factory
            ->createResponse(301)
            ->withHeader("Location", url("/twodicepig"));
    }

    public function destroy(): ResponseInterface
    {
        destroySession();

        $psr17Factory = new Psr17Factory();
        return $psr17Factory
            ->createResponse(301)
            ->withHeader("Location", url("/twodicepig"));
    }
}
