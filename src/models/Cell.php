<?php

namespace models;

/**
 * This is the model class for Cell.
 *
 * @property int $state
 * @property int $x
 * @property int $y
 */
class Cell
{
    private $state = 0;
    private $x = 0;
    private $y = 0;

    const ALIVE = 1;
    const DEAD = 0;

    /**
     * @param int $x
     * @param int $y
     * @param int $state
     */
    public function __construct($x, $y, $state = self::DEAD)
    {
        $this->x = $x;
        $this->y = $y;
        $this->state = $state;
    }

    /**
     * Returns cell x coordinate.
     *
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Returns cell y coordinate.
     *
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * Returns cell's state, 0 for dead or 1 for alive.
     *
     * @return int
     */
    public function isAlive()
    {
        return ($this->state == self::ALIVE)? true : false;
    }

    /**
     * Kills cell.
     *
     * @return void
     */
    public function kill()
    {
        $this->state = self::DEAD;
    }

    /**
     * Restores cell.
     *
     * @return void
     */
    public function restore()
    {
        $this->state = self::ALIVE;
    }
}
