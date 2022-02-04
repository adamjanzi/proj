<?php

namespace Adja20\Highscore;

class Highscore
{
    /**
     * @var int
     */
    protected $scoreId;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $highscore;

    public function getId()
    {
        return $this->scoreId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getHighscore()
    {
        return $this->highscore;
    }

    public function setHighscore($highscore)
    {
        $this->highscore = $highscore;
    }
}
