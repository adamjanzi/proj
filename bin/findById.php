<?php

require_once __DIR__ . "/bootstrap.php";

if ($argc !== 2) {
    echo "Usage ${argv[0]} <id>\n";
    exit(1);
}

$bookId = $argv[1];
$book = $entityManager->find('\Adja20\Book\Book', $bookId);

if ($book === null) {
    echo "No book found.\n";
    exit(1);
}

echo sprintf("%2d - %s - %u - %s - %s\n",
    $book->getId(),
    $book->getTitle(),
    $book->getIsbn(),
    $book->getAuthor(),
    $book->getImage()
);
