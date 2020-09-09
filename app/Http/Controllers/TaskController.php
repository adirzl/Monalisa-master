<?php

namespace App\Http\Controllers;

use App\Models\Baseline;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request){
        $data = Baseline::getSurveyorTask($request);
        $fieldOnGrid = Baseline::getFieldOnGrid();
        return view('task.default', compact('data', 'fieldOnGrid'));
    }

    public function show($id){
		$data = Baseline::findOrFail($id);
		$fieldOnForm = Baseline::getFieldOnForm();
		return view('task.show', compact('data','fieldOnForm'));
    }
}
