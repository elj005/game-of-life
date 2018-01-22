<?php

namespace tests;

use models\Cell;
use PHPUnit\Framework\TestCase;

class CellTest extends TestCase
{
    public function testGetX()
    {
        $cell = new Cell(5, 6, Cell::ALIVE);
        $cell->getX();

        $this->assertEquals(5, $cell->getX());
        $this->assertNotEquals(0, $cell->getX());
    }

    public function testGetY()
    {
        $cell = new Cell(5, 6, Cell::ALIVE);
        $cell->getY();

        $this->assertEquals(6, $cell->getY());
        $this->assertNotEquals(0, $cell->getY());
    }

    public function testIsAlive()
    {
        $cell = new Cell(5, 6, Cell::ALIVE);
        $this->assertEquals(true, $cell->isAlive());

        $cell = new Cell(5, 6, Cell::DEAD);
        $this->assertEquals(false, $cell->isAlive());
    }

    public function testKill()
    {
        $cell = new Cell(5, 6, Cell::ALIVE);
        $cell->kill();
        $this->assertFalse($cell->isAlive());
    }

    public function testRestore()
    {
        $cell = new Cell(5, 6, Cell::DEAD);
        $cell->restore();
        $this->assertTrue($cell->isAlive());
    }
}
