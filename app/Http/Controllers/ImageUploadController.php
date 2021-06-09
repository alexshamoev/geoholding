<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return response()
     */
    public function img_upload()
    {
        return view('imgUpload');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function imagestore(Request $request)
    {
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        $imageName = time().'.'.$request->image->extension();
        
        $request->image->move(public_path('image'),$imageName);
        // Store $imageName name in DATABASE from HERE
        return back()->with('success',"image upload successfully")->with('image',$imageName); ;
    }
}
