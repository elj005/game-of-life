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
     * Initialize board with dead cells.
     *
     * @return void
     */
    public function init()
    {
        $data = [];

        for ($y=0; $y<$this->rowCount; $y++) {
            for ($x=0; $x<$this->columnCount; $x++) {
                $data[$x][$y] = new Cell($x, $y);
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
        // calculate new coordinates if cell's outside the board
        $x = ($x+$this->columnCount)%$this->columnCount;
        $y = ($y+$this->rowCount)%$this->rowCount;

        return $this->data[$x][$y];
    }

    /**
     * Assigns the first generation.
     *
     * @return models\Board
     */
    public function new($density = 0.15)
    {
        // calculates number of live cells
        $population = round($this->rowCount*$this->columnCount*$density);

        for ($i=0; $i<$population; $i++) {
            // get random coordinates
            $randomX = rand(0, $this->columnCount);
            $randomY = rand(0, $this->rowCount);

            // restore cell
            $this->getCell($randomX, $randomY)->restore();
        }

        return $this;
    }

    /**
     * Runs the game.
     *
     * @return void
     */
    public function play($speed = 0.9)
    {
        // clears screen
        system('clear');

        // renders board
        $this->render();

        // set some delays
        usleep(abs(1-$speed)*1000000);

        // calculates next generation
        $this->tick();

        // repeat process
        $this->play($speed);
    }

    /**
     * Displays board.
     *
     * @return void
     */
    public function render()
    {
        $line = "";
        for ($y=0; $y<$this->rowCount; $y++) {
            for ($x=0; $x<$this->columnCount; $x++) {
                if ($this->getCell($x, $y)->isAlive()) {
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
                $cell = clone $this->getCell($x, $y);

                // counts cell's neighbours
                $total = (new Neighbour($x, $y, $this))->count();

                // applies game rules
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
