<?php
namespace Rigo\Controller;

use Rigo\Types\Course;
use Rigo\Types\Car;
use WP_REST_Request;

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
    
    public function addCar( WP_REST_Request $request ) {
        
        $json = json_decode( $request->get_body() );
        
        $id = wp_insert_post([
            'post_author' => '1', 
            'post_type'=>'car',
            'post_title' => $json->post_title,
            'post_status' => 'publish',
        ]);
        update_post_meta( $id, 'make', $json->make );
        update_post_meta( $id, 'model', $json->model );
        update_post_meta( $id, 'year', $json->year );
        update_post_meta( $id, 'color', $json->color );
        
        return 'Post created';

        // $post = (array) get_post($post_id);
        // $post['make'] = get_field( 'make', $post_id );
        // $post['model'] = get_field( 'model', $post_id );
        // $post['year'] = get_field( 'year', $post_id );
        // $post['color'] = get_field( 'color', $post_id );
        // return $post;
    }

    public function editCar( WP_REST_Request $request ) {
        
        $json = json_decode( $request->get_body() );
        $id = $json->id;

        $post = get_post( $id );
        $post->title = $json->title;
        update_post_meta( $id, 'make', $json->make );
        update_post_meta( $id, 'model', $json->model );
        update_post_meta( $id, 'year', $json->year );
        update_post_meta( $id, 'color', $json->color );

        wp_update_post( $post );
        
        return 'Post updated';
    }

    public function removeCar( WP_REST_Request $request ) {

        $json = json_decode( $request->get_body() );

        wp_delete_post( $json->id );

        return 'Post deleted';
    }
}
?>