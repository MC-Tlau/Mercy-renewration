<?php

namespace App\Http\Controllers;

use App\testing;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use PDF;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showform()
    {
        //
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Handle File Upload
        if($request->hasFile('scanned_documents'))
        {
            //get filename with extension
            $filenameWithExt = $request->file('scanned_documents')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('scanned_documents')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path =  $request->file('scanned_documents')->StoreAs('/documents',$fileNameToStore);
        }
            else
            {
                $fileNameToStore = 'noimage.jpg';
            }
        
            $members = request('member_number');
            $separate_members = implode(", ", $members);
            $ages = request('member_age');
            $s_ages = implode(", ",$ages);


        $data = new testing();
        
        $data -> family_members = $separate_members;
        $data -> family_age = $s_ages;
        $data -> save();


    }

 
    public function show($id)
    {
        $single_record =  Testing::find($id);
        return view('download')->with('single_record', $single_record);
    }

 
    public function edit(testing $testing)
    {
        $time = new Carbon();
        echo $time->now();
    }

 

    public function download($id){

        //Carbon
        $applicant = Applicant:: find($id);
        
        $pdf = PDF::loadView('rationcard_final',compact('applicant'));
        $fileName ="";
        try{
            $fileName = $applicant->application_no.' ration-card';
        }
        catch(Exception $e)
        {
            $fileName = 'myInfo';
        }

        if($applicant->status == 'renewed')
        {
            return $pdf->download($fileName.'.pdf');
        }
        
        else
        {

            return response("Nothing to download");
        }

        // return $pdf->stream();

    }
    public function status(Request $request)
    {
        $app_no = request('app_no');
        // $person = DB::table('applicants')->where('register_no', $find);
        $user = Applicant::where('application_no',$app_no)->first();
        // dd($user);
        if(!$user)
        {
            return redirect('/')->with('success', 'NO RECORD FOUND!');
        }

        else if ($user->status == "submitted" || $user->status == "forwarded" || $user->status == "Pending Signature")
        {
        return redirect('/') ->with ('success', "Application status:  $user->status");

        }
        
        else if ($user->status == "renewed") 
        {   return view('h', compact('user'));
        }
    }
       
}
