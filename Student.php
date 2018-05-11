<?php



class Student extends Model
{
    //public $table='abc';


    //BUSINESS LOGIC
    public function finishCourse()
    {
        $this->attributes['course']++;
        return $this;
    }

    public function changeGroup($name)
    {
        $this->attributes['name'] = $name;
        return $this;
    }

    public function changeStudyForm($id)
    {
        if ($id < 4){
            $this->attributes['study_form_id'] = $id;
            return $this;
        }
        throw  new Exception("Error: wrong study form id");
    }
}

//$arr = SQL::table('students')->select()->where('course = 2')->execute();print_r($arr);
//$us = Student::select()->where('course = 2')->execute();// get returns array of objects
//
//foreach ($us as $u) {
//    echo 1 . "\n";
//}

// $s1 = Student::find(5);
// $s1->changeGroup('Андрій');
//$s1->insert();
// echo $s1;

//
//$aa = ['id' => 10, 'name' => 'Олег', 'surname' => 'Юрченко', 'course' => 2, 'group_name' => 'ty61',
//    'birthday' => '1999-00-00', 'study_form_id' => 2];
//$s2 = new Student($aa,true);
//$s2->delete()->show();
//Student::find(5)->finishCourse()->insert(6);
//Student::find(6)->delete();
