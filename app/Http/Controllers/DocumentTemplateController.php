<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\Document;
use App\Models\DocumentTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentTemplateController extends Controller
{   
    public function index()
    {
        return view('templates.index', [
            'templates' => DocumentTemplate::latest()->get(),
        ]);
    }

    public function show(DocumentTemplate $template){
        return view('templates.show', [
            'template' => $template,
            'templates' => DocumentTemplate::latest()->get(),
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
            'link' => 'required|mimes:xls,xlm,xla,xlsx,doc,docx',
            'description' => 'required|min:15',
        ]);

        $template = DocumentTemplate::create([
            'name' => $request->title,
            'description' => $request->description,
            'update_cycle' => $request->cycle,
            'slug' => $slug = Str::slug($request->title, '-'),
            'link' => $request->file('link')->storeAs('templates', $slug . '.' . $request->link->getClientOriginalExtension()),
        ]);
        
        
        $template->file()->create([
            'url' => $request->file('link')->storeAs('templates', $slug . '.' . $request->link->getClientOriginalExtension()),
        ]);


        $barangays = Barangay::all();

        foreach($barangays as $barangay) {
            Document::create([
                'document_template_id' => $template->id,
                'barangay_id'=> $barangay->id,
            ]);
        }

        return redirect('/templates');
    }
}
