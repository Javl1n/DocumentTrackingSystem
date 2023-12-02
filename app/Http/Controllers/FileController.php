<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function download(File $file, Request $request){
        return Storage::download($file->url, $request->fileName);
    }
}
