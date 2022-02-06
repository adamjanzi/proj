<?php

/**
 * Load the routes into the router, this file is included from
 * `htdocs/index.php` during the bootstrapping to prepare for the request to
 * be handled.
 */

declare(strict_types=1);

use FastRoute\RouteCollector;

$router = $router ?? new RouteCollector(
    new \FastRoute\RouteParser\Std(),
    new \FastRoute\DataGenerator\MarkBased()
);

$router->addRoute("GET", "/", "\Adja20\Controller\Index");

$router->addGroup("/twodicepig", function (RouteCollector $router) {
    $router->addRoute("GET", "", ["\Adja20\Controller\TwoDicePigController", "view"]);
    $router->addRoute("POST", "/process", ["\Adja20\Controller\TwoDicePigController", "process"]);
    $router->addRoute("GET", "/destroy", ["\Adja20\Controller\TwoDicePigController", "destroy"]);
    $router->addRoute("POST", "/newround", ["\Adja20\Controller\TwoDicePigController", "newround"]);
});

$router->addGroup("/pighighscore", function (RouteCollector $router) {
    $router->addRoute("GET", "", ["\Adja20\Controller\PigHighscore", "view"]);
});
