<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Course;

class CourseController extends Controller {
    
    public function index()
    {
        $courses = Course::where('status', 1)->get(['id', 'title', 'description', 'image', 'suitable_for', 'enroll_count']);

        return response()->json($courses);
    }
}
