<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

use function Adja20\Functions\url;

?><!doctype html>
<html>
    <meta charset="utf-8">
    <title><?= $title ?? "No title" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= url("/favicon.ico") ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/css/style.css") ?>">
</head>

<body>

<header>
    <nav>
        <a href="<?= url("/") ?>">Home</a> |
        <a href="<?= url("/dice") ?>">Dice</a> |
        <a href="<?= url("/game21") ?>">Game 21</a> |
        <a href="<?= url("/yatzy/destroy") ?>">Yatzy</a> |
        <a href="<?= url("/book") ?>">Books</a> |
        <a href="<?= url("/highscore") ?>">Yatzy Highscore</a>
    </nav>
</header>
<main>
