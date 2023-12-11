<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CareerOpptunity;
use Illuminate\Support\Facades\Validator;

class CareerOpptunityController extends Controller
{
    public function index()
    {
        $carriers = CareerOpptunity::latest()->paginate(10);
        return view('careeropptunity.index', compact('carriers'));
    }

    public function create()
    {
        return view('careeropptunity.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'Deadline' => 'required|date',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('careeropptunity.create')
                ->withErrors($validator)
                ->withInput()
                ->with('success', 'Fail to create carrer opptunity');
        }

        $data = new CareerOpptunity();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->Deadline = $request->Deadline;
        $data->save();

        return redirect()
            ->route('careeropptunity.index')
            ->with('success', 'Career Opptunity created successfully');
    }

    public function show(CareerOpptunity $careerOpptunity, $id)
    {
        $showCareer = CareerOpptunity::findOrfail($id);
        return view('careeropptunity.show', compact('showCareer'));
    }

    public function edit(CareerOpptunity $careerOpptunity, $id)
    {
        $career = $careerOpptunity->find($id);
        return view('careeropptunity.edit', compact('career'));
    }

    public function update(Request $request, CareerOpptunity $careerOpptunity, $id)
    {
        $request->validate([
            'title' => 'required',
            'Deadline' => 'required|date',
            'description' => 'required',
        ]);

        $career = CareerOpptunity::findOrFail($id);

        $career->title = $request->input('title');
        $career->Deadline = $request->input('Deadline');
        $career->description = $request->input('description');
        $career->save();

        return redirect()
            ->route('careeropptunity.index')
            ->with('success', 'Career opportunity updated successfully');
    }

    public function destroy(CareerOpptunity $careerOpptunity, $id)
    {
        $career = CareerOpptunity::findOrFail($id);
        $career->delete();
        return redirect()->back();
    }
}
