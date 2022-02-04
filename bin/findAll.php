<?php

require_once __DIR__ . "/../bin/bootstrap.php";


$bookRepository = $entityManager->getRepository('\Adja20\Book\Book');
$books = $bookRepository->findAll();

echo "All books\n--------------------\n";

if ($books) {
    foreach ($books as $book) {
        echo sprintf("%2d - %s - %u - %s - %s\n",
            $book->getId(),
            $book->getTitle(),
            $book->getIsbn(),
            $book->getAuthor(),
            $book->getImage()
        );
    }
} else {
    echo " (empty)\n";
}

