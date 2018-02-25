<?php

namespace Sirma\RockScissorsPaper\OpenBundle\Service;

use Sirma\RockScissorsPaper\OpenBundle\Factory\ItemFactory;
use Sirma\RockScissorsPaper\OpenBundle\Factory\PlayerFactory;

/**
 * @author Panteley Panteleev <p_panteleev@abv.bg>
 */
class Game implements GameInterface
{

    /**
     * @var array
     */
    protected $items;

    /**
     * @var array
     */
    protected $players;

    /**
     * @var int
     */
    protected $playRounds;

    /**
     * @var int
     */
    protected $currentRound;

    public function __construct()
    {
        $this->currentRound = 0;
        $this->items = ItemFactory::createItems();
        $this->players = PlayerFactory::createPlayers();
    }

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Service\GameInterface::play()
     */
    public function play(): string
    {
        $this->canPlay();
        $message = '';

        foreach ($this->players as $key => $player) {
            $chosenItem = $this->items[array_rand($this->items)];
            $player->setLastItem($chosenItem);
            $this->players[$key] = $player;
        }

        $player1LastItem = $this->players[0]->getLastItem();
        $player2LastItem = $this->players[1]->getLastItem();
        $player1Name = $this->players[0]->getName();
        $player2Name = $this->players[1]->getName();
        if ($player1LastItem === $player2LastItem) {
            $message = 'The two players has equal results in this hand!';
        } elseif (in_array($player2LastItem->getName(), $player1LastItem->getBetterThanItems())) {
            $message = sprintf(
                '%s wins this round! %s has item %s, %s has item %s',
                $player1Name,
                $player1Name,
                $player1LastItem->getName(),
                $player2Name,
                $player2LastItem->getName()
            );
            $this->players[0]->updateScore(1);
            $this->updateCurrentRound();
        } else {
            $message = sprintf(
                '%s wins this round! %s has item %s, %s has item %s',
                $player2Name,
                $player2Name,
                $player2LastItem->getName(),
                $player1Name,
                $player1LastItem->getName()
            );
            $this->players[1]->updateScore(1);
            $this->updateCurrentRound();
        }

        return $message;
    }

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Service\GameInterface::winner()
     * @throws GameNotFinishedException
     */
    public function winner(): string
    {
        if ($this->isGameFinished() === false) {
            throw new GameNotFinishedException();
        }
        $message = '';
        $player1 = $this->players[0];
        $player2 = $this->players[1];
        $result = bccomp($player1->getScore(), $player2->getScore());
        switch ($result) {
            case 0:
                $message = sprintf('The two players has finished the game with equal points. They have %s points.', $player1->getScore());
                break;
            case 1:
                $message = sprintf('%s wins this game! He/ she has %s points.', $player1->getName(), $player1->getScore());
                break;
            case -1:
                $message = sprintf('%s wins this game! He/ she has %s points.', $player2->getName(), $player2->getScore());
                break;
            default:
                break;
        }

        return $message;
    }

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Service\GameInterface::isGameFinished()
     */
    public function isGameFinished(): bool
    {
        return $this->currentRound >= $this->playRounds;
    }

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Service\GameInterface::setItems()
     */
    public function setItems(array $items): GameInterface
    {
        $this->items = $items;

        return $this;
    }

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Service\GameInterface::getItems()
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Service\GameInterface::setPlayers()
     */
    public function setPlayers(array $players): GameInterface
    {
        $this->players = $players;

        return $this;
    }

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Service\GameInterface::getPlayers()
     */
    public function getPlayers(): array
    {
        return $this->players;
    }

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Service\GameInterface::setPlayRounds()
     */
    public function setPlayRounds(int $rounds): GameInterface
    {
        $this->playRounds = $rounds;

        return $this;
    }

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Service\GameInterface::getPlayRounds()
     */
    public function getPlayRounds(): int
    {
        return $this->playRounds;
    }

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Service\GameInterface::getCurrentRound()
     */
    public function getCurrentRound(): int
    {
        return $this->currentRound;
    }

    /**
     * @return GameInterface
     */
    protected function updateCurrentRound(): GameInterface
    {
        $this->currentRound++;

        return $this;
    }

    /**
     * @throws PlayRoundsNotValidException
     * @throws GameAlreadyFinishedException
     */
    protected function canPlay()
    {
        if ($this->playRounds < 1) {
            throw new PlayRoundsNotValidException();
        }
        if ($this->isGameFinished()) {
            throw new GameAlreadyFinishedException();
        }
    }
}
