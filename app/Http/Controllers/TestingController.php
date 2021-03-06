<?php

namespace App\Http\Controllers;

use App\testing;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use PDF;

class TestingController extends Controller
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

 
    public function show()
    {
        $persons =  Applicant::paginate(1);
        return view('applicantsinfo_clerk')->with('persons', $persons);
    
    }

 
    public function edit(testing $testing)
    {
        $time = new Carbon();
        // echo $time->now();
        $now = now();
        echo($now);
        echo '<br>';
        echo (time());
        echo '<br>';
        $number = 'RC'.Carbon::now()->format('Y').substr(floor(time()), 5, 10); //imp
        // echo substr($number, 5, 10);
        echo $number;

    }

 

    public function download($id){

        //Carbon
        $applicant = Applicant:: find($id);
        
        $pdf = PDF::loadView('rationcard_final',compact('applicant'));
        $fileName ="";
        try{
            $fileName = $applicant->register_no;
        }
        catch(Exception $e)
        {
            $fileName = 'myInfo';
        }
        return $pdf->download($fileName.'.pdf');
        // return $pdf->stream();

    }
    public function status(Request $request)
    {
        $reg_no = request('reg_no');
        // $person = DB::table('applicants')->where('register_no', $find);
        $user = Applicant::where('register_no',$reg_no)->first();
        // dd($user);
        if(!$user)
        {
            return redirect('/')->with('success', 'NO RECORD FOUND!');
        }

        else if ($user->status == "none" || $user->status == "forwarded" || $user->status == "Required Signature")
        {
        // return redirect('/') ->with ('check', "status : $user->status");
        return redirect('/') ->with ('success', "Application status:  $user->status");

        }
        
        else if ($user->status == "renewed") 
        {   return view('h', compact('user'));
        }
    }
       
}
