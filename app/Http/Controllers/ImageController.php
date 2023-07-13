<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function checkImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $targetPath = public_path('uploads/');
            $targetFileName = $file->getClientOriginalName();
            $fileType = $file->getClientOriginalExtension();

            $allowTypes = ['jpg', 'png', 'jpeg', 'gif'];
            if (in_array($fileType, $allowTypes)) {
                if ($file->move($targetPath, $targetFileName)) {
                    return response()->json('valid');
                } else {
                    return response()->json('invalid');
                }
            } else {
                return response()->json('invalid');
            }
        } else {
            return response()->json('invalid');
        }
    }
}
