<?php

/**
 * Plays new game.
 */

require 'src/autoload.php';

use models\Board;

// Sets board size to 40x30
$board = new Board(40, 30);

// Starts the game
$board->play();
