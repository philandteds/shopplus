<?php

/*!
  \class CustomPriceType custompricetype.php
  \ingroup eZDatatype
  \brief A content datatype which adding custom price calculator

*/

class CustomPriceType extends eZDataType
{
    const DATA_TYPE_STRING = "customprice";

    function CustomPriceType()
    {
        $this->eZDataType( self::DATA_TYPE_STRING, ezpI18n::tr( 'kernel/classes/datatypes', "Custom Price", 'Datatype name' ),
                           array( 'serialize_supported' => true ) );
    }

    /*!
     Returns the content.
    */
    function objectAttributeContent( $contentObjectAttribute )
    {
        $object = eZContentObject::fetch( $contentObjectAttribute->attribute('contentobject_id'));
        return eZCustomPriceHandler::exec('calculatePrice', $object);
    }


    function toString( $contentObjectAttribute )
    {
        $content = $contentObjectAttribute->attribute('content');
        if($content)
            return $content->attribute( 'price' );
        return '';
    }

    function hasObjectAttributeContent( $contentObjectAttribute )
    {
        return $contentObjectAttribute->attribute( 'content' ) !== null;
    }

    function isInformationCollector()
    {
        return false;
    }

    /*!
     \return true if the datatype can be indexed
    */
    function isIndexable()
    {
        return false;
    }

}

eZDataType::register( CustomPriceType::DATA_TYPE_STRING, "CustomPriceType" );

?>
