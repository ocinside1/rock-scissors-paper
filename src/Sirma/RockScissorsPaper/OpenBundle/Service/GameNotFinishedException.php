<?php

namespace Sirma\RockScissorsPaper\OpenBundle\Service;

/**
 * @author Panteley Panteleev <p_panteleev@abv.bg>
 */
class GameNotFinishedException extends \LogicException
{

    /**
     * @param string $message
     */
    public function __construct($message = 'This game is not finished!')
    {
        parent::__construct($message);
    }
}
