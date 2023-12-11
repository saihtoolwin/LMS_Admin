<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Curriculums;
use App\Models\Year;
use Illuminate\Http\Request;

class CurriculumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // dd('it is index');
        $years = Year::all();
        $curriculums = Curriculums::all();
        foreach ($curriculums as $teamMember) {
            $teamMember->image = base64_decode($teamMember->image);
            // $image=file_put_contents(public_path("img/teacher"),$teamMember->image);

        }
        // dd($years);
        return view('curriculum.index', ['years' => $years, 'curriculums' => $curriculums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // dd('Hello');
        $years = Year::all();
        return view('curriculum.create', ['years' => $years]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $this->validate($request, [
            'year_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        $image = $request->file('image');
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->move(public_path('img/teacher'), $imageName);
        // Convert the image to base64
        $imagePath = public_path('img/teacher/') . $imageName;

        $compressedImage = Image::make($imagePath)->resize(300, 300)->encode('jpg', 100);
        $compressedImagePath = public_path('img/teacher/') . $imageName;
        $compressedImage->save($compressedImagePath);
        $base64CompressedImage = base64_encode(file_get_contents($compressedImagePath));
    
        Curriculums::create([
            'year_id' => $validatedData['year_id'],
            'title' => $validatedData['title'],
            'image' => $base64CompressedImage,
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('curriculum.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curriculums  $curriculums
     * @return \Illuminate\Http\Response
     */
    public function show(Curriculums $curriculums, $id)
    {
        //
        $curriculum = Curriculums::findOrFail($id);
        // dd($curriculum);
  
        $curriculum->image = base64_decode($curriculum->image);
         
        // dd($curriculum);
        return view('curriculum.show', ['curriculum' => $curriculum]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curriculums  $curriculums
     * @return \Illuminate\Http\Response
     */
    public function edit(Curriculums $curriculums, $id)
    {
        //
        $curriculum = Curriculums::findOrFail($id);
        return view('curriculum.edit', ['curriculum' => $curriculum]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curriculums  $curriculums
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curriculums $curriculums, $id)
    {
        //

        $curriculum = Curriculums::findOrFail($id);
        // dd($curriculum);
        $validatedData = $this->validate($request, [
            'title' => 'required',
            'year_id' => 'required|regex:/^[1-2]$/',
            'description' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img/teacher'), $imageName);
            // Convert the image to base64
            $imagePath = public_path('img/teacher/') . $imageName;
            $compressedImage = Image::make($imagePath)->resize(300, 300)->encode('jpg', 100);
            $compressedImagePath = public_path('img/teacher/') . $imageName;
            $compressedImage->save($compressedImagePath);
            $base64CompressedImage = base64_encode(file_get_contents($compressedImagePath));
        
        } else {
            $base64CompressedImage = $curriculum->image;
        }
        $curriculum->update([
            'title' => $validatedData['title'],
            'image' => $base64CompressedImage,
            'year_id' => $validatedData['year_id'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('curriculum.index')->with('success', 'Curriculum updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curriculums  $curriculums
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curriculums $curriculums, $id)
    {
        //
        $curriculum = Curriculums::find($id);
        if (!$curriculum) {
            return redirect()->back()->with('error', 'Item not found.');
        }

        $curriculum->delete();
        return redirect()
            ->back()
            ->with('success', 'Successfully deleted ');
    }
}
