<?php
/**
 * File containing the eZCustomPriceHandlerInterface interface.
 *
 */

interface eZCustomPriceHandlerInterface
{
    static public function calculatePrice( $object );
    static public function updatePrice( $object, $option_list );
}

?>
