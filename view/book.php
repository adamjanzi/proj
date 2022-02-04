<?php

require_once __DIR__ . "/../bin/bootstrap.php";

$bookRepository = $entityManager->getRepository('\Adja20\Book\Book');
$books = $bookRepository->findAll();

?>

<h1>All Books</h1>

<?php

if ($books) {
    foreach ($books as $book) {
            echo "<h2>ID: " . $book->getId() . "</h2>";
            echo "<p>Title: " . $book->getTitle() . "</p>";
            echo "<p>ISBN: " . $book->getIsbn() . "</p>";
            echo "<p>Author: " . $book->getAuthor() . "</p>";
            echo "<img src='../view/images/" . $book->getImage() . "' alt='" . $book->getTitle() . "'>";
    }
} else {
    echo "No books\n";
}
