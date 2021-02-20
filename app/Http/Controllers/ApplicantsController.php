<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


use Illuminate\Http\Request;
use App\Applicant;
use App\Mail\ApproveMail;
use App\Mail\RejectMail;
use App\Mail\Approve;

use PDF;


use Illuminate\Support\Facades\Response;


class ApplicantsController extends Controller
{
    //
    public function index()
    {
        $persons =  DB::select('select * from applicants where status = ? or status = ?', ['none','pending']);
        return view('applicantsinfo')->with('persons', $persons);

    }

    public function store(Request $request)
    {
        $data = new Applicant();
        $data -> register_no = request('register_no');
        $data -> ration_no = request('ration_no');
        $data -> date =  date("Y/m/d");

        $data -> door_no = request('door_no');
        $data -> sub_locality = request('sub_locality1');
        $data -> sub_locality2 = request('sub_locality2');
        $data -> ward_no = request('ward_door_no');
        $data -> location = request('address_location');
        $data -> pin_code = request('pin_code');
        $data -> police_station = request('police_station');
        $data -> post_office = request('post_office');
        $data -> sub_district = request('sub_district');
        $data -> state = request('state');
        $data -> gender = request('gender');

        $data -> family_head = request('family_head');
        $data -> appellation = request('appellation');
        $data -> residing_period = request('residing_period');
        $data -> suffix = request('suffix');
        $data -> religion = request('religion');

        $data -> monthly_income = request('income');
        $data -> dob = request('dob');
        $data -> relationship = request('relationship');
        $data -> occupation = request('occupation');
        $data -> electricity = request('electricity');
        $data -> gas = request('gas');

        $data -> documents = request('documents');
        $data -> email = request('email');
        $data -> phone = request('phone_number');

        $data -> note_sheet_no = mt_rand(1000,9999);
        $data -> note_sheet = request('notesheet');
        $data -> remarks = request('remarks');
        $data -> status = 'none';


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
        
        //Stores the files in the database
        if($request->hasFile('scanned_documents'))
        {
            $data -> scanned_documents = $fileNameToStore;

        }


        $members = request('member_number');
        $separate_members = implode(", ", $members);
        $ages = request('age_number');
        $s_ages = implode(", ",$ages);

        $data -> family_members = $separate_members;
        $data -> family_ages = $s_ages;

        $data -> save();


        $user = $data->id;
        $success = "Succesfully Submitted Application";

        return redirect('/home') -> with(compact('user','success'));     

    }

    public function show($id)
    {
        $single_record =  Applicant::find($id);
        return view('details')->with('single_record', $single_record);
    }

    public function download($docu)
    {
        // $single_record = Applicant::find($id);
        // dd($docu);
        $filename = $docu;
        $file_path1 = public_path()."/storage/documents/". $filename;
        dd($file_path1);
        // $file_path2 = "/storage/documents/". $filename;
   
         if (file_exists($file_path1)) 
            { 
                // Send Download
                return Response::download($file_path1, $filename, [ 
                    'Content-Length: '. filesize($file_path1) 
                ]); 
            } 
            else 
            { 
                // Error 
                exit('Requested file does not exist on our server!'); 
            }  
    }

     public function update(Request $request, $id)
    {
        $single_record =  Applicant::find($id);
        if ($request->has('issue')) 
        {
            $single_record->status = "forwarded";
            $single_record->save();
            // Mail::to($single_record->email)->send(new ApproveMail());

            Mail::to($single_record->email)->send(new Approve());
            return redirect('/applicants') ->with ('success', "Succesfully Forwarded Registration Number $single_record->register_no");
        }
        else
        {
            $single_record->status = "rejected";
            $single_record->save();

        }
        
    }

    public function myDownload($id){

        //Carbon
        $applicant = Applicant:: find($id);
        
        $pdf = PDF::loadView('mypdf',compact('applicant'));
        $fileName ="";
        try{
            $fileName = $applicant->register_no;
        }
        catch(Exception $e)
        {
            $fileName = 'myInfo';
        }
        return $pdf->download($fileName.'.pdf');

    }

    public function showremarks($id)
    {
        return view('remarks')->with('id', $id);

    }

    public function storeremarks(Request $request, $id)
    {
        $applicant = Applicant:: find($id);
        $applicant->remarks = request('rm');
        $applicant->save();
        Mail::to($applicant->email)->send(new RejectMail($applicant));
        return redirect('/applicants') ->with ('success', "Succesfully Rejected Registration Number $applicant->register_no");

    }

}