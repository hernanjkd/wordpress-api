<?php
namespace Rigo\Types;
    
use WPAS\Types\BasePostType;

class Car extends BasePostType{
    
    public static function serialize($object){
        
        $arrayObject = (array) $object;
        // $arrayObject['make'] = get_field( 'make', $object->ID );
        // $arrayObject['model'] = get_field( 'model', $object->ID );
        // $arrayObject['year'] = get_field( 'year', $object->ID );
        $arr = [];
        $arr['color'] = get_field( 'color', $object->ID );
        $arr['id'] = $arrayObject['ID'];
        return $arr;
        return $arrayObject;
        
        // print_r($object); die();
    }
}

?>