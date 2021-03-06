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

  
    public function edit(testing $testing)
    {
        $time = new Carbon();
        echo $time->now();
    }

 

    public function download($id){

        //Carbon
        $applicant = Applicant:: findorfail($id);
        
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

            abort(403,"Nothing to download");
        }

       

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

        else if ($user->status == "renewed") 
        {   
            return view('h', compact('user'));
        }

        else
        {
            return redirect('/') ->with ('success', "Application status:  $user->status");
        }
        
        
    }
       
}
