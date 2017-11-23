# Coding Challenge

This is the coding test that we use for engineers at [Sidekicker](https://www.sidekicker.com.au/).

The aim is to demonstrate how you approach thinking about problems and translating them to code. 

Fork this repository to your own, spend around *3 hours* working on a solution and then submit it back to us as a pull request as though you were submitting a pull request for a task you'd done in a work environment.

Please use modern PHP or JavaScript - whichever you have the most experience with.

## Challenge: Conway's Game of Life

The Game of Life, also known simply as Life, is a cellular automaton devised by the British mathematician John Horton Conway in 1970.
The "game" is a zero-player game, meaning that its evolution is determined by its initial state, requiring no further input. One interacts with the Game of Life by creating an initial configuration and observing how it evolves.

http://en.wikipedia.org/wiki/Conway%27s_Game_of_Life

![Game of Life](https://user-images.githubusercontent.com/291728/33158075-ec01ddde-d05a-11e7-99b8-35af2fed02e5.gif)

![Game of Life](https://user-images.githubusercontent.com/291728/33158078-ef0cdb5a-d05a-11e7-8259-bfc74f6747e7.gif)

### Game Rules

* A cell can be made "alive"
* A cell can be "killed"
* A cell with fewer than two live neighbours dies of under-population
* A cell with 2 or 3 live neighbours lives on to the next generation
* A cell with more than 3 live neighbours dies of overcrowding
* An empty cell with exactly 3 live neighbours "comes to life"
* The board should wrap

### Implementation

It's up to you how you implement this, especially how you render the visual representation of the game. If you are short for time, it's ok to not do any visual rendering at all, but it should be clear how that would be implemented in future. Tests are also optional, but looked upon very favourably if included.
