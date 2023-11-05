<?php

namespace App\Http\Controllers;

use App\Models\DocumentTemplate;
use Illuminate\Http\Request;

class DocumentTemplateController extends Controller
{
    public function index()
    {
        return view("templates.index", [
            "templates" => DocumentTemplate::latest()->paginate(10),
        ]);
    }
    public function create()
    {
        return view("templates.create");
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
        ]);

        return redirect('/templates');
    }
}
