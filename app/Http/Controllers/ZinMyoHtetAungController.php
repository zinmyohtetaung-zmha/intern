<?php

namespace App\Http\Controllers;

use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use App\Interfaces\ClassInterface;
use App\Interfaces\SchoolInterface;
use App\Interfaces\StudentInterface;
use App\Interfaces\TeacherInterface;
use App\DBTransactions\School\CreateSchool;
use App\DBTransactions\School\DeleteSchool;
use App\DBTransactions\School\UpdateSchool;
use App\DBTransactions\StdClass\CreateClass;
use App\DBTransactions\StdClass\DeleteClass;
use App\DBTransactions\StdClass\UpdateClass;
use App\DBTransactions\Student\CreateStudent;
use App\DBTransactions\Student\DeleteStudent;
use App\DBTransactions\Student\UpdateStudent;
use App\DBTransactions\Teacher\CreateTeacher;
use App\DBTransactions\Teacher\DeleteTeacher;
use App\DBTransactions\Teacher\UpdateTeacher;

class ZinMyoHtetAungController extends Controller
{
    use ResponseAPI;

    protected $schoolInterface;
    protected $studentInterface;
    protected $teacherInterface;
    protected $classInterface;


    public function __construct(SchoolInterface $schoolInterface, StudentInterface $studentInterface, TeacherInterface $teacherInterface, ClassInterface $classInterface)
    {
        $this->schoolInterface = $schoolInterface;
        $this->studentInterface = $studentInterface;
        $this->teacherInterface = $teacherInterface;
        $this->classInterface = $classInterface;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSchools()
    {
        try {
            $schools = $this->schoolInterface->getAllSchools();

            if (!$schools) return $this->error("No school Data.", 404);

            return $this->success("All users", $schools);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createschool(Request $request)
    {
        try {
            $school = new CreateSchool($request);
            $newSchool = $school->executeProcess();

            if ($newSchool) {
                return $this->success('Created school', $newSchool);
            } else {
                return $this->error('Error', 404);
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    //update school
    public function updateschool(Request $request, $id)
    {
        try {
            $getSchool = $this->schoolInterface->getSchoolById($id);
            if (!$getSchool) return $this->error("No school data.", 404);

            $school = new UpdateSchool($request, $id);
            $updatedSchool = $school->executeProcess();


            if ($updatedSchool) {
                return $this->success('Updated school', $updatedSchool);
            } else {
                return $this->error('Error', 404);
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    //delete school
    public function deleteuser($id)
    {
        try {

            $getshool = $this->schoolInterface->getSchoolById($id);
            if (!$getshool) return $this->error("No user Data.", 404);

            $deleteSchool = new DeleteSchool($id);
            $del = $deleteSchool->executeProcess();

            if ($del) {
                return $this->success('Deleted school.', $del);
            } else {
                return $this->error('error', 404);
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    //get all class
    public function getClasses()
    {
        try {
            $classes = $this->classInterface->getAllClasses();

            if (!$classes) return $this->error("No school Data.", 404);

            return $this->success("All classes", $classes);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }


    //create class
    public function createClass(Request $request)
    {
        try {

            $class = new CreateClass($request);
            $newclass = $class->executeProcess();

            if ($newclass) {
                return $this->success('Created class!', $newclass);
            } else {
                return $this->error("error", 404);
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    //update class
    public function updateClass(Request $request, $id)
    {
        try {

            $getClass = $this->classInterface->getClassById($id);
            if (!$getClass) return $this->error("No class data.", 404);

            $class = new UpdateClass($request, $id);
            $updateclass = $class->executeProcess();

            if ($updateclass) {
                return $this->success('Updated class!', $updateclass);
            } else {
                return $this->error("error", 404);
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    //delete class
    public function deleteClass($id)
    {
        try {
            $getClass = $this->classInterface->getClassById($id);
            if (!$getClass) return $this->error('No class data.', 404);

            $class = new DeleteClass($id);
            $delClass = $class->executeProcess();
            if ($class) {
                return $this->success('Deleted class', $delClass);
            } else {
                return $this->error('Error', 404);
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    //get all student
    public function getStudents()
    {
        try {
            $students = $this->studentInterface->getAllStudents();

            if (!$students) return $this->error("No school Data.", 404);

            return $this->success("All students", $students);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

     //join table
     public function jointable()
     {
         try {
             $data = $this->studentInterface->joinTable();
 
             if (!$data) return $this->error("No Data.", 404);
 
             return $this->success("All data", $data);
         } catch (\Exception $e) {
             return $this->error($e->getMessage(), $e->getCode());
         }
     }

    //create Student
    public function createStudent(Request $request)
    {
        try {

            $student = new CreateStudent($request);
            $newStudent = $student->executeProcess();

            if ($newStudent) {
                return $this->success('Created student!', $newStudent);
            } else {
                return $this->error("error", 404);
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    //update student
    public function updateStudent(Request $request, $id)
    {
        try {

            $getStudent = $this->studentInterface->getStudentById($id);
            if (!$getStudent) return $this->error("No student data.", 404);

            $student = new UpdateStudent($request, $id);
            $updatestudent = $student->executeProcess();

            if ($updatestudent) {
                return $this->success('Updated student!', $updatestudent);
            } else {
                return $this->error("error", 404);
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    //delete student
    public function deleteStudent($id)
    {
        try {
            $getStudent = $this->studentInterface->getStudentById($id);
            if (!$getStudent) return $this->error('No class data.', 404);

            $student = new DeleteStudent($id);
            $deleteStudent = $student->executeProcess();
            if ($deleteStudent) {
                return $this->success('Deleted student', $deleteStudent);
            } else {
                return $this->error('Error', 404);
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    //get all teachers
    public function getTeachers()
    {
        try {
            $teachers = $this->teacherInterface->getAllTeachers();

            if (!$teachers) return $this->error("No teacher Data.", 404);

            return $this->success("All teachers", $teachers);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    //create teacher
    public function createTeacher(Request $request)
    {
        try {

            $teacher = new CreateTeacher($request);
            $newTeacher = $teacher->executeProcess();

            if ($newTeacher) {
                return $this->success('Created teacher!', $newTeacher);
            } else {
                return $this->error("error", 404);
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    //update teacher
    public function updateTeacher(Request $request, $id)
    {
        try {

            $getTeacher = $this->teacherInterface->getTeacherById($id);
            if (!$getTeacher) return $this->error('No class data.', 404);

            $teacher = new UpdateTeacher($request, $id);
            $updateteacher = $teacher->executeProcess();

            if ($updateteacher) {
                return $this->success('Updated teacher!', $updateteacher);
            } else {
                return $this->error("error", 404);
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    //delete teacher
    public function deleteTeacher($id)
    {
        try {
            $getTeacher = $this->teacherInterface->getTeacherById($id);
            if (!$getTeacher) return $this->error('No class data.', 404);

            $teacher = new DeleteTeacher($id);
            $deleteTeacher = $teacher->executeProcess();
            if ($deleteTeacher) {
                return $this->success('Deleted teacher', $deleteTeacher);
            } else {
                return $this->error('Error', 404);
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
