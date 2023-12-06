<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\BarangayHealthWorker;
use App\Models\Document;
use App\Models\DocumentAccess;
use App\Models\DocumentDate;
use App\Models\DocumentTemplate;
use App\Models\User;
use Illuminate\Http\Request;

class DocumentAccessController extends Controller
{
    public function edit(Barangay $barangay, $template, $date) 
    {
        $document = $barangay
                        ->documents()
                        ->where(
                            'document_template_id', 
                            DocumentTemplate::where('slug', $template)->first()->id
                        )
                        ->first();

        $date = $document->dates()->where('date', $date)->first();
        

        // ddd($date->canAccess->pluck('user_id'));

        return view('documents.accesses.edit', [
            'date' => $date, 
            'document' => $document,
            'users' => BarangayHealthWorker::whereNot('barangay_id', $barangay->id)->whereNotIn('id', $date->canAccess->pluck('user_id'))->get(),
        ]);
    }
    public function update(Barangay $barangay, $template, $date, Request $request) 
    {
        $document = $barangay
                        ->documents()
                        ->where(
                            'document_template_id', 
                            DocumentTemplate::where('slug', $template)->first()->id
                            )
                        ->first();

        $date = $document->dates()->where('date', $date)->first();
        
        DocumentAccess::where('document_date_id', $date->id)->delete();

        if(isset($request->users))
        {
            foreach($request->users as $user)
            {
                $date->canAccess()->create([
                    'user_id'=> $user,
                ]);
            }
        }
        
        return redirect(route('documents.dates.show', ['barangay' => $barangay->slug, 'template' => $template, 'date'=> $date->date]));
    }
}
