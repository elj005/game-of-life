<?php

namespace models;

/**
 * This is the model class for Neighbour.
 *
 * @property int $centerX
 * @property int $centerY
 * @property models\Board $board
 */
class Neighbour
{
    private $centerX;
    private $centerY;
    private $board;

    /**
     * @param int $centerX
     * @param int $centerY
     * @param models\Board $board
     */
    public function __construct($centerX, $centerY, $board)
    {
        $this->centerX = $centerX;
        $this->centerY = $centerY;
        $this->board = $board;
    }

    /**
     * Counts living neighbours.
     *
     * @return int
     */
    public function count()
    {
        $directions = [
            [-1, -1], [0, -1], [1, -1],
            [-1,  0], [0,  0], [1,  0],
            [-1,  1], [0,  1], [1,  1],
        ];

        $total = 0;
        foreach ($directions as $direction) {
            list($directionX, $directionY) = $direction;

            if ($this->find($directionX, $directionY)->isAlive()) {
                $total++;
            }
        }

        return $total;
    }

    /**
     * Finds neighbour.
     *
     * @param int $directionX
     * @param int $directionY
     * @return models\Cell
     */
    public function find($directionX, $directionY)
    {
        return $this->board->getCell($this->centerX+$directionX, $this->centerY+$directionY);
    }
}
