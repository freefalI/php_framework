<?php


class StudentController extends Controller
{
    public function student($params)
    {
        //extract($params, EXTR_SKIP);
        $id=$params['id'];

        $st = Student::find($id);
        echo output('student/student', ['student' => $st,'id'=>$id]);
    }

    public function students()
    {
        $students = Student::select()->execute();
        echo output('student/students', ['students' => $students]);
    }
}


