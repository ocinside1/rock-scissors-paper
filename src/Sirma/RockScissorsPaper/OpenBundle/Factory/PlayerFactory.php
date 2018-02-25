<?php

namespace Sirma\RockScissorsPaper\OpenBundle\Factory;

use Sirma\RockScissorsPaper\OpenBundle\Model\Player;

/**
 * @author Panteley Panteleev <p_panteleev@abv.bg>
 */
class PlayerFactory
{

    /**
     * @var array
     */
    const PLAYERS = array(
        'Player1',
        'Player2',
    );

    /**
     * @return \Sirma\RockScissorsPaper\OpenBundle\Model\Player[]
     */
    public static function createPlayers()
    {
        $players = array();
        foreach (static::PLAYERS as $single) {
            $player = new Player();
            $player->setName($single);
            $players[] = $player;
        }

        return $players;
    }
}
