<?php

namespace Sirma\RockScissorsPaper\OpenBundle\Helper;

/**
 * @author Panteley Panteleev <p_panteleev@abv.bg>
 */
final class ItemHelper
{

    /**
     * @param array $items
     * @return void
     * @throws ItemConfigNotValidException
     */
    public static function checkItemsValidity(array $items): void
    {
        foreach ($items as $item) {
            if (is_array($item) === false || empty($item)) {
                throw new ItemConfigNotValidException();
            } else {
                foreach ($item as $subItem) {
                    if (is_array($subItem) === false || empty($subItem)) {
                        throw new ItemConfigNotValidException();
                    } else {
                        foreach ($subItem as $value) {
                            if (is_array($value) === false || array_key_exists('BetterThan', $value) === false) {
                                throw new ItemConfigNotValidException();
                            } else {
                                foreach ($value as $v) {
                                    if (is_array($v) === false || empty($v)) {
                                        throw new ItemConfigNotValidException();
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    private function __construct()
    {
        
    }
}
