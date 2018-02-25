<?php

namespace Sirma\RockScissorsPaper\OpenBundle\Tests\Factory;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Sirma\RockScissorsPaper\OpenBundle\Model\Player;
use Sirma\RockScissorsPaper\OpenBundle\Factory\PlayerFactory;

/**
 * @author Panteley Panteleev <p_panteleev@abv.bg>
 */
class PlayerFactoryTest extends WebTestCase
{

    public function testCreatePlayers()
    {
        try {
            $playerNames = array('Player1', 'Player2');
            $players = array();
            foreach ($playerNames as $playerName) {
                $player = new Player();
                $player->setName($playerName);
                $players[] = $player;
            }
            $this->assertEquals($players, PlayerFactory::createPlayers());
        } catch (\Exception $e) {
            $this->assertEquals(200, $e->getCode(), $e->getMessage());
        }
        $this->assertEquals(200, 200);
    }
}
