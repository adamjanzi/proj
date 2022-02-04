<?php

namespace Adja20\Book;

class Book
{
    /**
     * @var int
     */
    protected $bookId;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var int
     */
    protected $isbn;

    /**
     * @var string
     */
    protected $author;

    /**
     * @var string
     */
    protected $image;

    public function getId()
    {
        return $this->bookId;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getIsbn()
    {
        return $this->isbn;
    }

    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }
}
