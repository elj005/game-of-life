<?php

namespace models;

/**
 * This is the model class for Board.
 *
 * @property int $columnCount
 * @property int $rowCount
 * @property int $density
 * @property array $data
 * @property float $speed
 */
class Board
{
    private $columnCount = 0;
    private $rowCount = 0;
    private $density = .15;
    private $data = [];
    private $speed = 0.9;

    /**
     * @param int $columnCount
     * @param int $rowCount
     */
    public function __construct($columnCount, $rowCount)
    {
        $this->columnCount = $columnCount;
        $this->rowCount = $rowCount;

        $this->init();
    }

    /**
     * Initialize board.
     *
     * @return void
     */
    public function init()
    {
        $data = [];

        for ($y=0; $y<$this->rowCount; $y++) {
            for ($x=0; $x<$this->columnCount; $x++) {
                $data[$x][$y] = new Cell($x, $y);

                if (rand(0, 100)<($this->density*100)) {
                    $data[$x][$y]->restore();
                }
            }
        }

        $this->setData($data);
    }

    /**
     * Returns a cell of the board.
     *
     * @return models\Cell
     */
    public function getCell($x, $y)
    {
        $x = ($x+$this->columnCount)%$this->columnCount;
        $y = ($y+$this->rowCount)%$this->rowCount;

        return $this->data[$x][$y];
    }

    /**
     * Returns array of models\Cell.
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Runs the game.
     *
     * @return void
     */
    public function play($speed = 0.9)
    {
        $this->render();
        usleep(abs(1-$speed)*1000000);

        $this->tick();
        $this->play($speed);
    }

    /**
     * Displays board.
     *
     * @return void
     */
    public function render()
    {
        system('clear');

        $line = "";
        for ($y=0; $y<$this->rowCount; $y++) {
            for ($x=0; $x<$this->columnCount; $x++) {
                if ($this->data[$x][$y]->isAlive()) {
                    $line .= " █ ";
                } else {
                    $line .= "   ";
                }
            }
            $line .= "\n";
        }

        echo $line;
    }

    /**
     * Sets data.
     *
     * @return void
     */
    public function setData($data)
    {
        return $this->data = $data;
    }

    /**
     * Sets the new generation from the current one.
     *
     * @return void
     */
    public function tick()
    {
        $successor = [];
        for ($y=0; $y<$this->rowCount; $y++) {
            for ($x=0; $x<$this->columnCount; $x++) {
                $total = (new Neighbour($x, $y, $this))->count();

                $cell = clone $this->getCell($x, $y);
                if ($total==3) {
                    $cell->restore();
                } elseif ($total!=4) {
                    $cell->kill();
                }

                $successor[$x][$y] = $cell;
            }
        }
        $this->setData($successor);
    }
}
