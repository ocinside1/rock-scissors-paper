<?php

namespace Sirma\RockScissorsPaper\OpenBundle\Model;

/**
 * @author Panteley Panteleev <p_panteleev@abv.bg>
 */
interface ItemInterface
{

    /**
     * @param string $name
     * @return ItemInterface
     */
    public function setName(string $name): ItemInterface;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param array $items
     * @return ItemInterface
     */
    public function setBetterThanItems(array $items): ItemInterface;

    /**
     * @return array
     */
    public function getBetterThanItems(): array;
}
