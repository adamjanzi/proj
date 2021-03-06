<?php

declare(strict_types=1);

namespace Adja20\Controller;

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

use function Adja20\Functions\{
    destroySession,
    renderView,
    url
};

/**
 * Controller for the pig highscore route.
 */
class PigHighscore
{
    public function view(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $body = renderView("layout/pighighscore.php");

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }
}
