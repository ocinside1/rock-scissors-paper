<?php

namespace Sirma\RockScissorsPaper\OpenBundle\Service;

/**
 * @author Panteley Panteleev <p_panteleev@abv.bg>
 */
interface GameInterface
{

    /**
     * @return string
     */
    public function play(): string;

    /**
     * @return string
     */
    public function winner(): string;

    /**
     * @return bool
     */
    public function isGameFinished(): bool;

    /**
     * @param array $items
     * @return GameInterface
     */
    public function setItems(array $items): GameInterface;

    /**
     * @return array
     */
    public function getItems(): array;

    /**
     * @param array $players
     * @return GameInterface
     */
    public function setPlayers(array $players): GameInterface;

    /**
     * @return array
     */
    public function getPlayers(): array;

    /**
     * @param int $rounds
     * @return GameInterface
     */
    public function setPlayRounds(int $rounds): GameInterface;

    /**
     * @return int
     */
    public function getPlayRounds(): int;

    /**
     * @return int
     */
    public function getCurrentRound(): int;
}
