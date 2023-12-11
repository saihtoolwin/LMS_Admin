<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use App\Models\CoreTeam;
use Illuminate\Http\Request;

class CoreTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $coreTeam = CoreTeam::all();
        foreach ($coreTeam as $teamMember) {
            $teamMember->image = base64_decode($teamMember->image);
        }
        // dd($coreTeam);
        return view('coreteam.index', ['coreteams' => $coreTeam]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('coreteam.create');
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
            'name' => 'required',
            'image' => 'required|image',
            'role' => 'required',
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
    

        CoreTeam::create([
            'name' => $validatedData['name'],
            'image' => $base64CompressedImage,
            'role' => $validatedData['role'],
        ]);

        return redirect()->route('coreteam.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoreTeam  $coreTeam
     * @return \Illuminate\Http\Response
     */
    public function show(CoreTeam $coreTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoreTeam  $coreTeam
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $coreTeam = CoreTeam::findOrFail($id); // Fetch the specific CoreTeam record by its ID
        $coreTeam->image = base64_decode($coreTeam->image);
        return view('coreteam.edit', ['coreteam' => $coreTeam]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoreTeam  $coreTeam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoreTeam $coreTeam, $id)
    {
        //
        // dd($request->all());
        $coreTeam = CoreTeam::findOrFail($id);
        $validatedData = $this->validate($request, [
            'name' => 'required',

            'role' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img/teacher'), $imageName);
            $imagePath = public_path('img/teacher/') . $imageName;
            $compressedImage = Image::make($imagePath)->resize(300, 300)->encode('jpg', 100);
            $compressedImagePath = public_path('img/teacher/') . $imageName;
            $compressedImage->save($compressedImagePath);
            $base64CompressedImage = base64_encode(file_get_contents($compressedImagePath));
        
        } else {
            $base64Image = $coreTeam->image;
        }
        $coreTeam->update([
            'name' => $validatedData['name'],
            'image' => $base64CompressedImage,
            'role' => $validatedData['role'],
        ]);

        return redirect()->route('coreteam.index')->with('success', 'Core team member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoreTeam  $coreTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoreTeam $coreTeam, $id)
    {
        //
        $coreTeam = CoreTeam::find($id);
        if (!$coreTeam) {
            return redirect()->back()->with('error', 'Item not found.');
        }

        $coreTeam->delete();
        return redirect()
            ->back()
            ->with('success', 'Successfully deleted ');
    }
}
