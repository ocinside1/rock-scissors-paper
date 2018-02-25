<?php

namespace Sirma\RockScissorsPaper\OpenBundle\Model;

/**
 * @author Panteley Panteleev <p_panteleev@abv.bg>
 */
class Player implements PlayerInterface
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $score;

    /**
     * @var ItemInterface
     */
    protected $lastItem;

    public function __construct()
    {
        $this->score = 0;
    }

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Model\PlayerInterface::setName()
     */
    public function setName(string $name): PlayerInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Model\PlayerInterface::getName()
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Model\PlayerInterface::updateScore()
     */
    public function updateScore(int $points): PlayerInterface
    {
        $this->score += $points;

        return $this;
    }

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Model\PlayerInterface::getScore()
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Model\PlayerInterface::setLastItem()
     */
    public function setLastItem(ItemInterface $item): PlayerInterface
    {
        $this->lastItem = $item;

        return $this;
    }

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Model\PlayerInterface::getLastItem()
     */
    public function getLastItem(): ItemInterface
    {
        return $this->lastItem;
    }
}
