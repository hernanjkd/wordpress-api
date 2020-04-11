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

        // $post_id = wp_insert_post([
        //     'post_author' => '1', 
        //     'post_type'=>'car',
        //     'post_title' => 'title',
        //     'post_status' => 'publish',
        // ]);
        $post_id = 29;
        // update_post_meta( $post_id, 'make', 'alfa' );
        // update_post_meta( $post_id, 'model', 'pointer' );
        // update_post_meta( $post_id, 'year', '1950' );
        // update_post_meta( $post_id, 'color', 'forest' );
        
        $post = get_post($post_id);
        $post['make'] = get_field( 'make', $post_id );
        $post['model'] = get_field( 'make', $post_id );
        $post['year'] = get_field( 'make', $post_id );
        $post['color'] = get_field( 'make', $post_id );
        
        return $post;
        // return WP_REST_Request::get_body();
    }
}
?>