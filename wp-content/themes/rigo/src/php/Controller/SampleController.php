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
        // $post_id = wp_insert_post(array(
        //     'ID' => '',
        //     'post_author' => '1', 
        //     'post_category' => array(),
        //     'post_content' => 'content', 
        //     'post_title' => 'title',
        //     'post_status' => 'publish'
        // ));
        return get_post(18);
        // return WP_REST_Request::get_body();
    }
}
?>