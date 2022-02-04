<?php

use Adja20\Book\Book;

require_once __DIR__ . "/bootstrap.php";

if ($argc !== 5) {
    echo "Usage ${argv[0]} <title> <isbn> <author> <image>\n";
    exit(1);
}

$newBookTitle = $argv[1];
$newBookIsbn = $argv[2];
$newBookAuthor= $argv[3];
$newBookImage = $argv[4];

$book = new Book();
$book->setTitle($newBookTitle);
$book->setIsbn($newBookIsbn);
$book->setAuthor($newBookAuthor);
$book->setImage($newBookImage);

$entityManager->persist($book);
$entityManager->flush();

echo "Created Book with ID " . $book->getId() . "\n";
