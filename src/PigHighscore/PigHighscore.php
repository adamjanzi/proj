<?php

namespace Adja20\PigHighscore;

class PigHighscore
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
    protected $pigHighscore;

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

    public function getPigHighscore()
    {
        return $this->pigHighscore;
    }

    public function setPigHighscore($pigHighscore)
    {
        $this->pigHighscore = $pigHighscore;
    }
}
