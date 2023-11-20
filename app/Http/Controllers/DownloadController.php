<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download(Request $request)
    {
        // switch ($request->type) {
        //     case "template":

        // }
        return Storage::download($request->link, );
    }
}
