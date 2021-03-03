<?php

namespace App\Http\Controllers;
use App\Applicant;
use App\old_ration;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ApplicantsController_clerk extends Controller
{
    public function index()
    {
        // $persons =  DB::select('select * from applicants where status = ?', ['forwarded'])->paginate(1);
        $persons =  Applicant::where('status', 'forwarded')->orderby('updated_at')->paginate(9);
        return view('applicantsinfo_clerk')->with('persons', $persons);

    }

    public function show($id)
    {   
        $single_record =  Applicant::find($id);
        return view('details_clerk')->with('single_record', $single_record);
    }

    public function update(Request $request, $id)
    {
        // $single_record =  old_ration::find($id);
        $single = Applicant::find($id);
        // DB::update('update old_ration set ration_no = ? where id = ?',['6666', $single_record->id]);
        if ($request->has('update')) 
        {
            $single->status = "Pending Signature";
            $single->save();
            return redirect('/applicants_clerk') ->with ('success', "Succesfully Updated Application Number $single->application_no");
        }
        // else
        // {
        //     $single_record->status = "rejected";
        //     $single_record->save();
        // }
    }
}
