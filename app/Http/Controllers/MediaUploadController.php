<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MediaUploadController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'directory' => 'required|string|max:255',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $directory = $request->input('directory');
        $file = $request->file('file');

        $path = $file->store($directory, 'public');

        return response()->json([
            'message' => 'Upload successfully',
            'url' => Storage::disk('public')->url($path),
        ]);
    }
}
