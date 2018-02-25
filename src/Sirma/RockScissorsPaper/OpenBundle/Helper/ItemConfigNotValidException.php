<?php

namespace Sirma\RockScissorsPaper\OpenBundle\Helper;

/**
 * @author Panteley Panteleev <p_panteleev@abv.bg>
 */
class ItemConfigNotValidException extends \InvalidArgumentException
{

    /**
     * @param string $message
     */
    public function __construct($message = 'Your items\' config is not valid!')
    {
        parent::__construct($message);
    }
}
