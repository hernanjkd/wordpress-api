<?php
namespace Rigo\Controller;

use Rigo\Types\Course;
use Rigo\Types\Car;

class SampleController{
    
    public function getHomeData(){
        return [
            'name' => 'Rigoberto',
            'date' => 'Apr 9th'
        ];
    }
    
    public function getDraftCourses(){
        $query = Course::all([ 'status' => 'draft' ]);
        return $query->posts;
    }

    public function getDraftCars(){
        $query = Car::all([ 'status' => 'draft' ]);
        $lst = [];
        forEach($query->posts as $x) {
            $lst[] = Car::serialize($x);
        }
        return $lst;
    }
    
    public function addCar() {
        $post_id = wp_insert_post([
            'post_author' => '1', 
            'post_type'=>'car',
            'post_title' => 'title',
            'post_status' => 'publish',
            'Make'=>'alfa',
            'Model'=>'pointer',
            'Year'=>'1950',
            'Color'=>'forest'
        ]);
        return get_post($post_id);
        // return WP_REST_Request::get_body();
    }
}
?>