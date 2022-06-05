<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function getAllStudents() {
        // get all students
        $students = Student::get()->toJson(JSON_PRETTY_PRINT);
        return response($students, 200)->header('Content-Type', 'application/json');;
    }

    public function getStudent ( $id ) {
        // get a student

        if( Student::where('id', $id )->exists() ) {
            $student = Student::where('id', $id )->get()->toJson(JSON_PRETTY_PRINT);
            return response($student, 200)->header('Content-Type', 'application/json');;
        } else {
            return response()->json([
                'message' => 'Student not found'
            ], 404)->header('Content-Type', 'application/json');;
        }
    }

    public function createStudent( Request $request ) {
        try {
            $student = new Student();
            $student->name = $request->name;
            $student->course = $request->course;
            $student->save();

            return response()->json([
                'message' => 'Student created successfully',
            ], 200)->header('Content-Type', 'application/json');;
            
        } catch (\Exception $e ) {
            return response()->json([
                'message' => 'Error creating student',
            ], 400)->header('Content-Type', 'application/json');;
        }
    }

    public function updateStudent ( Request $request, $id ) 
    {
        // update a student
        if( Student::where('id', $id)->exists() ) {
            $student = Student::find($id);
            $student->name = is_null($request->name) ? $student->name : $request->name;
            $student->course = is_null($request->course) ? $student->course : $request->course;
            $student->save();

            return response()->json([
                'message' => 'Student updated successfully'
            ], 200)->header('Content-Type', 'application/json');;
        } else {
            return response()->json([
                'message' => 'Student not found'
            ], 404)->header('Content-Type', 'application/json');;
        }
    }

    public function deleteStudent ( $id ) 
    {
        // delete a student
        if( Student::where('id', $id)->exists() ) {
            $student = Student::find($id);
            $student->delete();

            return response()->json([
                'message' => 'Student delete successfully'
            ], 200)->header('Content-Type', 'application/json');
        } else {
            return response()->json([
                'message' => 'Student not found'
            ], 404)->header('Content-Type', 'application/json');;
        }
    }
}
