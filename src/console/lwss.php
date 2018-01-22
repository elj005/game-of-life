<?php

/**
 * Runs lightweight spaceship.
 */

require 'src/autoload.php';

use models\Board;

// Sets board size to 40x30
$board = new Board(40, 30);

// Form lightweight spaceship pattern
$board->getCell(0, 0)->restore();
$board->getCell(3, 0)->restore();
$board->getCell(4, 1)->restore();
$board->getCell(0, 2)->restore();
$board->getCell(4, 2)->restore();
$board->getCell(1, 3)->restore();
$board->getCell(2, 3)->restore();
$board->getCell(3, 3)->restore();
$board->getCell(4, 3)->restore();

// Starts the game
$board->play();
