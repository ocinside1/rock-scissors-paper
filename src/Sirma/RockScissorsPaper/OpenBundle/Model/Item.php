<?php

namespace Sirma\RockScissorsPaper\OpenBundle\Model;

/**
 * @author Panteley Panteleev <p_panteleev@abv.bg>
 */
class Item implements ItemInterface
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $betterThanItems;

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Model\ItemInterface::setName()
     */
    public function setName(string $name): ItemInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Model\ItemInterface::getName()
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Model\ItemInterface::setBetterThanItems()
     */
    public function setBetterThanItems(array $items): ItemInterface
    {
        $this->betterThanItems = $items;

        return $this;
    }

    /**
     * {@inheritDoc}
     * @see \Sirma\RockScissorsPaper\OpenBundle\Model\ItemInterface::getBetterThanItems()
     */
    public function getBetterThanItems(): array
    {
        return $this->betterThanItems;
    }
}
