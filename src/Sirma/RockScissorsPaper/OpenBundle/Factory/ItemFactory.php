<?php

namespace Sirma\RockScissorsPaper\OpenBundle\Factory;

use Symfony\Component\Yaml\Yaml;
use Sirma\RockScissorsPaper\OpenBundle\Model\Item;
use Sirma\RockScissorsPaper\OpenBundle\Helper\ItemHelper;

/**
 * @author Panteley Panteleev <p_panteleev@abv.bg>
 */
class ItemFactory
{

    /**
     * @return \Sirma\RockScissorsPaper\OpenBundle\Model\Item[]
     */
    public static function createItems()
    {
        $itemsConfig = static::readItemsConfig();
        $items = array();
        foreach ($itemsConfig as $single) {
            foreach ($single as $subItem) {
                foreach ($subItem as $key => $value) {
                    $item = new Item();
                    $item->setName($key)->setBetterThanItems($value['BetterThan']);
                    $items[] = $item;
                }
            }
        }

        return $items;
    }

    /**
     * @throws \Exception
     * @return array
     */
    public static function readItemsConfig()
    {
        try {
            $items = Yaml::parseFile(__DIR__ . '/../Resources/config/items.yml');
            ItemHelper::checkItemsValidity($items);
        } catch (\Exception $e) {
            throw $e;
        }

        return $items;
    }
}
