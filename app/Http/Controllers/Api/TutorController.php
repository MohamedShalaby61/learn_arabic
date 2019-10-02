<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Tutor;

class TutorController extends Controller {
    
    public function topTutors()
    {
        $tutors = Tutor::where('status', 1)->orderBy('rating', 'desc')->limit(10)->get(['id', 'name', 'title', 'image', 'rating']);

        return response()->json($tutors);
    }

    public function tutors()
    {
        $tutors = Tutor::where('status', 1)->orderBy('rating', 'desc')->limit(10)->get(['id', 'name', 'title', 'image', 'rating', 'online']);

        return response()->json($tutors);
    }
    
    public function tutor($id)
    {
        $tutor = Tutor::with(['country:id,name', 'lessonsType:id,name', 'tutoringPersonality', 'accent'])->findOrFail($id);
        $tutor->specialities = $tutor->specialities()->pluck('name');
        unset($tutor->created_at, $tutor->updated_at, $tutor->user_id, $tutor->country_id, $tutor->lessons_type_id, $tutor->tutoring_personality_id, $tutor->accent_id, $tutor->status);
        
        return response()->json($tutor);
    }

    public function favorites()
    {
        $favorites = @auth()->user()->profile->favorites;
        if (!$favorites) {
            $favorites = [];
        }

        return response()->json($favorites);
    }
}
