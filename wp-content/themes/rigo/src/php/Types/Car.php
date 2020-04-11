<?php
namespace Rigo\Types;
    
use WPAS\Types\BasePostType;

class Car extends BasePostType{
    
    public static function serialize($object){
        
        $arrayObject = (array) $object;
        
        $arrayObject['make'] = get_field( 'make', $object->ID );
        $arrayObject['model'] = get_field( 'model', $object->ID );
        $arrayObject['year'] = get_field( 'year', $object->ID );
        $arr['color'] = get_field( 'color', $object->ID );
        return $arrayObject;
        
        // $arr = [];
        // $arr['color'] = get_field( 'color', $object->ID );
        // $arr['id'] = $object->ID;
        // return $arr;
        
        // print_r($object); die();
    }
}

?>