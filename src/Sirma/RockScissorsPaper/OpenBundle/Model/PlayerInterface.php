<?php

namespace Sirma\RockScissorsPaper\OpenBundle\Model;

/**
 * @author Panteley Panteleev <p_panteleev@abv.bg>
 */
interface PlayerInterface
{

    /**
     * @param string $name
     * @return PlayerInterface
     */
    public function setName(string $name): PlayerInterface;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param int $points
     * @return PlayerInterface
     */
    public function updateScore(int $points): PlayerInterface;

    /**
     * @return int
     */
    public function getScore(): int;

    /**
     * @param ItemInterface $item
     * @return PlayerInterface
     */
    public function setLastItem(ItemInterface $item): PlayerInterface;

    /**
     * @return ItemInterface
     */
    public function getLastItem(): ItemInterface;
}
