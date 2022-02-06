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
    <ul>
        <li><a href="<?= url("/") ?>">Home</a></li>
        <li><a href="<?= url("/twodicepig/destroy") ?>">Play Two-Dice Pig</a></li>
        <li><a href="<?= url("/pighighscore") ?>">Highscore</a></li>
    </ul>
</header>
<main>
