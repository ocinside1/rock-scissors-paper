<?php

namespace Sirma\RockScissorsPaper\OpenBundle\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Sirma\RockScissorsPaper\OpenBundle\Service\Game;
use Sirma\RockScissorsPaper\OpenBundle\Factory\ItemFactory;
use Sirma\RockScissorsPaper\OpenBundle\Factory\PlayerFactory;

/**
 * @author Panteley Panteleev <p_panteleev@abv.bg>
 */
class GameTest extends WebTestCase
{

    /**
     * @var Game
     */
    protected $game;

    public function testAll()
    {
        try {
            $this->createGame();
            $this->play();
            $this->winner();
        } catch (\Exception $e) {
            $this->assertEquals(200, $e->getCode(), $e->getMessage());
        }
        $this->assertEquals(200, 200);
    }

    protected function createGame()
    {
        $this->game = new Game();
        $this->game->setPlayRounds(3);
        $this->assertEquals(3, $this->game->getPlayRounds());
        $this->assertEquals(0, $this->game->getCurrentRound());
        $this->assertEquals(ItemFactory::createItems(), $this->game->getItems());
        $this->assertEquals(PlayerFactory::createPlayers(), $this->game->getPlayers());
    }

    protected function play()
    {
        $this->assertEquals(false, $this->game->isGameFinished());
        while ($this->game->isGameFinished() === false) {
            $this->game->play();
        }
        $this->assertEquals(true, $this->game->isGameFinished());
    }

    protected function winner()
    {
        $this->assertEquals(true, $this->game->isGameFinished());
        $this->game->winner();
    }
}
