<?php

namespace App\Http\Controllers;

use App\Models\DocumentTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentTemplateController extends Controller
{
    public function index()
    {
        return view('cho.templates.index', [
            'templates' => DocumentTemplate::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('cho.templates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'cycle' => 'required|numeric|gt:0',
        ]);

        DocumentTemplate::create([
            'name' => $request->title,
            'update_cycle' => $request->cycle,
            'slug' => Str::slug($request->title, '-'),
        ]);

        return redirect('/');
    }
}
