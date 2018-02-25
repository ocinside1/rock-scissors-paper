<?php

namespace Sirma\RockScissorsPaper\OpenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sirma\RockScissorsPaper\OpenBundle\Service\Game;

/**
 * @author Panteley Panteleev <p_panteleev@abv.bg>
 */
class DefaultController extends Controller
{

    public function indexAction()
    {
        try {
            $game = new Game();
            $game->setPlayRounds(3);
            while ($game->isGameFinished() === false) {
                echo $game->play(), '<br />';
            }
            echo $game->winner(), '<br />';
        } catch (\Exception $e) {
            echo 'Something went wrong!', '<br />';
        }
        exit;
    }
}
