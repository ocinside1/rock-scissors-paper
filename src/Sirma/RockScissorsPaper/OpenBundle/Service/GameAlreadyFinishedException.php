<?php

namespace Sirma\RockScissorsPaper\OpenBundle\Service;

/**
 * @author Panteley Panteleev <p_panteleev@abv.bg>
 */
class GameAlreadyFinishedException extends \InvalidArgumentException
{

    /**
     * @param string $message
     */
    public function __construct($message = 'This game is already finished!')
    {
        parent::__construct($message);
    }
}
