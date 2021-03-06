<?php

declare(strict_types=1);

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Iterators;

use const PHP_INT_MAX;

/**
 * Class Fibonacci.
 */
class Fibonacci extends Iterators
{
    /**
     * @var int
     */
    protected $current;

    /**
     * The maximum limit.
     *
     * @var int
     */
    protected $max;

    /**
     * The previous element.
     *
     * @var int
     */
    private $previous = 1;

    /**
     * Fibonacci constructor.
     */
    public function __construct()
    {
        $this->setMaxLimit(PHP_INT_MAX);
        parent::__construct();
    }

    /**
     * Get the maximum limit.
     *
     * @return int
     *             The limit
     */
    public function getMaxLimit()
    {
        return (int) $this->max;
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        [$this->current, $this->previous] = [$this->current + $this->previous, $this->current];
        ++$this->key;
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->previous = 1;
        $this->current = 0;
        $this->key = 0;
    }

    /**
     * Set the maximum limit.
     *
     * @param int $max
     *                 The limit
     */
    public function setMaxLimit($max)
    {
        $this->max = $max;
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return $this->getMaxLimit() > $this->current;
    }
}
