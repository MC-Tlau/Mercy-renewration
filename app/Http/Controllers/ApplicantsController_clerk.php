<?php

namespace App\Http\Controllers;
use App\Applicant;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ApplicantsController_clerk extends Controller
{
    public function index()
    {
        $persons =  DB::select('select * from applicants where status = ?', ['forwarded']);
        // dd($persons);
        return view('applicantsinfo_clerk')->with('persons', $persons);

    }

    public function show($id)
    {   
        $single_record =  Applicant::find($id);
        return view('details_clerk')->with('single_record', $single_record);
    }

    public function update(Request $request, $id)
    {
        $single_record =  Applicant::find($id);
        if ($request->has('issue')) 
        {
            $single_record->status = "pending";
            $single_record->save();
        }
        else
        {
            $single_record->status = "rejected";
            $single_record->save();
        }
    }
}
