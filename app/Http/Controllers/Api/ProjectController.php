<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('type', 'devlangs')->paginate(5);
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }
    public function show($slug){
        $project = Project::with('type', 'devlangs')->where('slug', $slug)->first();
        if($project){
            return response()->json([
                'success' => true,
                'results' => $project
            ]);
        }else{
            return response()->json([
                'success' => false,
                'results' => 'Nessun progetto trovato'
            ]);
        }
    } 
}