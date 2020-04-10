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
        
    }
}
?>