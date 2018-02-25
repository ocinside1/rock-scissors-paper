<?php

namespace Sirma\RockScissorsPaper\OpenBundle\Service;

/**
 * @author Panteley Panteleev <p_panteleev@abv.bg>
 */
class PlayRoundsNotValidException extends \InvalidArgumentException
{

    /**
     * @param string $message
     */
    public function __construct($message = 'Play rounds must be 1 or higher!')
    {
        parent::__construct($message);
    }
}
