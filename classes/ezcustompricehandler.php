<?php

/**
 * eZAddToBasketHandler class
 *
 */
class eZCustomPriceHandler
{
    /**
     * Call calculatePrice user definied functions.
     *
     * @static
     * @param string $object
     * @param array $result(instance of eZSinglePrice)
     * @return bool
     */
    static function exec( $method, $object, $params = null)
    {

        $ini = eZINI::instance( 'shopplus.ini' );
        $handlers = $ini->variable( 'PriceSettings', 'CustomPriceHandler' );

        if ( !$object && !$handlers && !isset($handlers[$object->attribute('class_identifier')])){
            return false;
        }
        else {
		if(isset($params) && $params != null)
			return call_user_func_array( array( $handlers[$object->attribute('class_identifier')], $method ), array($object, $params));
		else
                        return call_user_func( array( $handlers[$object->attribute('class_identifier')], $method ), $object);
        }
        return null;
    }
}

?>
