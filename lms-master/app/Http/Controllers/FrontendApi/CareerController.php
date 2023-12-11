<?php

namespace App\Http\Controllers\FrontendApi;

use App\Http\Controllers\Controller;
use App\Models\CareerOpptunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    public function index()
    {
        $career = CareerOpptunity::all();
        return response()->json([
            'code' => 200,
            'success' => true,
            'career' => $career,
            'data' => 'Get all Career Opportunity',
        ],200);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'Deadline' => 'required|date',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 422,
                'success' => false,
                'error' => $validator->errors(),
                'message' => 'Validation errors',
            ],422);
        }
        $career = new CareerOpptunity();
        $career->title = $request->title;
        $career->Deadline = $request->Deadline;
        $career->description = $request->description;
        $career->save();
        return response()->json([
            'code' => 201,
            'success' => true,
            'career' => $career,
            'data' => 'Career Opportunity created successfully',
        ],201);
    }

    public function show($id)
    {
        $career = CareerOpptunity::findOrFail($id);
        return response()->json([
            'code' => 200,
            'success' => true,
            'career' => $career,
        ],200);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'Deadline' => 'required|date',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'code' => 422,
                'success' => false,
                'error' => $validator->errors(),
                'message' => 'Validation errors',
            ],422);
        }

        $career = CareerOpptunity::findOrFail($id);
        $career->title = $request->title;
        $career->Deadline = $request->Deadline;
        $career->description = $request->description;
        $career->save();
        return response()->json([
            'code' => 200,
            'success' => true,
            'data' => 'Career Opportunity updated successfully',
        ],200);
    }

    public function destroy($id)
    {
        $career = CareerOpptunity::findOrFail($id);
        $career->delete();
        return response()->json([
            'code' => 200,
            'success'=> true,
            'data'=> 'Career Opportunity deleted successfully'
        ],200);
    }
}
