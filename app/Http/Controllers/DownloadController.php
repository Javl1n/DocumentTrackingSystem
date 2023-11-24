<?php

namespace App\Http\Controllers;

use App\Models\DocumentTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download(Request $request)
    {
        switch ($request->type) {
            case "template":
                $filename = DocumentTemplate::where("link", $request->link)->first()->slug;
        }
        return Storage::download($request->link, $filename);
    }
}
