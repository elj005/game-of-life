<?php

namespace tests;

use models\Board;
use models\Cell;
use PHPUnit\Framework\TestCase;

class BoardTest extends TestCase
{
    public function testGetCell()
    {
        $board = new Board(2, 2);
        $cell = $board->getCell(0, 0);

        $this->assertInstanceOf('models\Cell', $cell);
    }

    public function testRenderOne()
    {
        $this->expectOutputString(" █ \n");

        $board = new Board(1, 1);
        $board->getCell(0, 0)->restore();
        $board->render();
    }

    public function testRenderTwo()
    {
        $this->expectOutputString("   \n");

        $board = new Board(1, 1);
        $board->getCell(0, 0)->kill();
        $board->render();
    }
}
