<?php

/**
 * Runs glider.
 */

require 'src/autoload.php';

use models\Board;

// Sets board size to 40x30
$board = new Board(40, 30);

// Form glider pattern
$board->getCell(2, 1)->restore();
$board->getCell(3, 2)->restore();
$board->getCell(1, 3)->restore();
$board->getCell(2, 3)->restore();
$board->getCell(3, 3)->restore();

// Starts the game
$board->play();
