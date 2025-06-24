<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function index(Request $request)
    {
        $visitors = Visit::with(['professionalVisit.company', 'familyVisit'])
            ->get()
            ->map(function ($visit) {
                if ($visit->professionalVisit) {
                    $visit->visit_type = 'professional';
                } else {
                    $visit->visit_type = 'family';
                }
                return $visit;
            });

        return response()->json([
            'visitors' => $visitors
        ], 200);
    }
}
