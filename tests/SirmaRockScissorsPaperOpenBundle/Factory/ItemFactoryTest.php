<?php

namespace Sirma\RockScissorsPaper\OpenBundle\Tests\Factory;

use Symfony\Component\Yaml\Yaml;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Sirma\RockScissorsPaper\OpenBundle\Factory\ItemFactory;
use Sirma\RockScissorsPaper\OpenBundle\Model\Item;
use Sirma\RockScissorsPaper\OpenBundle\Helper\ItemHelper;

/**
 * @author Panteley Panteleev <p_panteleev@abv.bg>
 */
class ItemFactoryTest extends WebTestCase
{

    public function testCreateItems()
    {
        try {
            $itemsConfig = ItemFactory::readItemsConfig();
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
            $this->assertEquals($items, ItemFactory::createItems());
        } catch (\Exception $e) {
            $this->assertEquals(200, $e->getCode(), $e->getMessage());
        }
        $this->assertEquals(200, 200);
    }

    public function testReadItemsConfig()
    {
        try {
            $items = Yaml::parseFile(__DIR__ . '/../../../src/Sirma/RockScissorsPaper/OpenBundle/Resources/config/items.yml');
            ItemHelper::checkItemsValidity($items);
            $this->assertEquals($items, ItemFactory::readItemsConfig());
        } catch (\Exception $e) {
            $this->assertEquals(200, $e->getCode(), $e->getMessage());
        }
        $this->assertEquals(200, 200);
    }
}
