<?php

namespace App\Http\Controllers;

use App\Models\Image;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(){
        return Image::all();
    }
    public function UplaodImage(Request $request){
        $file = $request->file('image');
        $imageName = time().'_'.$file->extension();
        $file->move(public_path('image'),$imageName);
        // $filepath = $request->file('image')->store('images');
        $image = Image::create([
            'image' => $imageName,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => $image
        ]);
    }
}
