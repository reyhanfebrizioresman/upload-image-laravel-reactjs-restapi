<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Upload::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // if ($request->file('image')){
            $file = $request->file('image');
            $image_name = time()."_".$file->extension();
            $file->move(public_path('images'),$image_name);

            $upload = Upload::create([
                'image' => $image_name,
                'title' => $request->title,
                'content' => $request->content,
            ]);
        // }else{
        //     $upload = Upload::create([
        //         'title' => $request->title,
        //         'content' => $request->content,
        //     ]);
        // }

        return response()->json([
            "status" => true,
            "message" => "success",
            "data" => $upload,

        ]);
    }
    public function upload(Request $request)
    {
        
        // if ($request->file('image')){
            $file = $request->file('image');
            $image_name = time()."_".$file->getClientOriginalName();
            $file->move(public_path('images'),$image_name);

            $upload = Upload::create([
                'image' => $image_name,
                'title' => $request->title,
                'content' => $request->content,
            ]);
        // }else{
        //     $upload = Upload::create([
        //         'title' => $request->title,
        //         'content' => $request->content,
        //     ]);
        // }

        return redirect('/uploadImage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
