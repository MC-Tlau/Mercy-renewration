<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Applicant;
use App\Monitoring;

use App\Mail\SubmitMail;
use App\Mail\RejectMail;
use App\Mail\Approve;

use PDF;
use Carbon\Carbon;


use Illuminate\Support\Facades\Response;


class ApplicantsController extends Controller
{
    //
    public function index()
    {
        // $persons =  DB::select('select * from applicants where status = ? or status = ?', ['submitted','Pending Signature']);
        $persons =  Applicant::where('status','submitted')
        ->orWhere('status', 'Pending Signature')
        ->orderby('updated_at')->paginate(9);

        return view('applicantsinfo')->with('persons', $persons);
       
    }

    public function store(Request $request)
    {
       $validated = $request->validate([
           'register_no' => 'required|unique:Applicants,register_no',
           'ration_no' => 'required|unique:Applicants,ration_no',
           'door_no' => 'required',
           'address_location' => 'required',
           'sub_locality1' => 'required',
           'sub_locality2' => 'nullable',
           'ward_door_no' => 'required',
           'address_location' => 'required',
           'pin_code' => 'required',
           'police_station' => 'required',
           'post_office' => 'required',
           'sub_district' => 'required',
           'state' => 'required',
           'gender' => 'required',
           'family_head' => 'required',
           'residing_period' => 'required',
           'religion' => 'required',
           'income' => 'required',
           'dob' => 'required',
           'relationship' => 'required',
           'occupation' => 'required',
           'electricity' => 'required',
           'gas' => 'required',
           'email' => 'required|unique:Applicants,email',
           'phone_number' => 'required',
           'old_ration_document' => 'required|file|max:1999',
           'aadhaar_document' => 'required|file|max:1999',

       ]);
     
        $data = new Applicant();
        $monitor = new Monitoring();
        $monitor -> application_received_date = Carbon::now()->toDateTimeString();

        // $data -> application_no = substr(floor(time()), 5, 10);
        $data -> application_no = 'RC'.Carbon::now()->format('Y').substr(floor(time()), 5, 10);
        $data -> register_no = request('register_no');
        $data -> ration_no = request('ration_no');

        $data -> door_no = request('door_no');
        $data -> sub_locality = request('sub_locality1');
        $data -> sub_locality2 = request('sub_locality2');
        $data -> ward_no = request('ward_door_no');
        $data -> location = request('address_location');
        $data -> pin_code = request('pin_code');
        $data -> police_station = request('police_station');
        $data -> post_office = request('post_office');
        $data -> sub_district = request('sub_district');
        $data -> district = request('state');
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

        $data -> documents = request('documents'); //make note of this
        $data -> email = request('email');
        $data -> phone = request('phone_number');

        $data -> note_sheet_no = mt_rand(1000,9999);
        $data -> note_sheet = request('notesheet');
        $data -> remarks = request('remarks');
        $data -> status = 'submitted';


        if($request->hasFile('old_ration_document'))
        {
            //get filename with extension
            $filenameWithExt = $request->file('old_ration_document')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('old_ration_document')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore1 = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path =  $request->file('old_ration_document')->StoreAs('/documents',$fileNameToStore1);
        }
        if($request->hasFile('aadhaar_document'))
        {
            $filenameWithExt = $request->file('aadhaar_document')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('aadhaar_document')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore2 = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path =  $request->file('aadhaar_document')->StoreAs('/documents',$fileNameToStore2);
        }

        if($request->hasFile('old_ration_document') && $request->hasFile('aadhaar_document'))
        {
            $data -> old_ration = $fileNameToStore1;
            $data -> aadhaar = $fileNameToStore2;
        }

        
        $members = request('member_number');
        if($members > 0)
        {
            $separate_members = implode(", ", $members);
            $ages = request('age_number');
            $s_ages = implode(", ",$ages);
            //Store family members and respective ages as comma separated
            $data -> family_members = $separate_members;
            $data -> family_ages = $s_ages;
        }
       
        $data -> save();
        $data -> monitoring()->save($monitor);

        $user = $data->id;
        Mail::to($data->email)->send(new SubmitMail($data));
        $success = "Succesfully Submitted Application";
        return redirect('/home') -> with(compact('user','success'));     

    }

    public function show($id)
    {
        $single_record =  Applicant::find($id);
        
        $applicant = $single_record;
        if($single_record->status != "Pending Signature")
        {
            return view('details')->with('single_record', $single_record);
        }
        else
        {
            return view('rationcard', compact('applicant'));
        }
    }
    

    public function download($docu)
    {
        $filename = $docu;
        $file_path1 = public_path()."/storage/documents/". $filename;
   
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
        $monitor = Monitoring::where('applicant_id', $id)->first();
        $monitor -> application_status_date = Carbon::now();


        //Check which button is pressed
        if ($request->has('issue')) 
        {
            $single_record->status = "forwarded";
            $single_record->save();
            $monitor->save();
            return redirect('/applicants') ->with ('success', "Succesfully Forwarded Application Number $single_record->application_no");
        }
        else if ($request->has('sign'))
        {
            $single_record->status = "renewed";
            $monitor -> application_renewed_date = Carbon::now()->toDateTimeString();
            $single_record->save();
            $monitor->save();
            Mail::to($single_record->email)->send(new Approve($single_record));
            return redirect('/applicants') ->with ('success', "Succesfully Signed Application Number $single_record->application_no");

        }
        else
        {
            $single_record->status = "rejected";
            $single_record->save();
            $monitor->save();
            return redirect('/applicants') ->with ('success', "Succesfully Rejected Application Number $single_record->application_no");

        }

        
    }

    public function myDownload($id)
    {
        //Carbon
        $applicant = Applicant:: findorfail($id);
        
        $pdf = PDF::loadView('mypdf',compact('applicant'));
        $fileName ="";
        try{
            $fileName = $applicant->application_no;
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
        $monitor = Monitoring::where('applicant_id', $id)->first();
        $applicant->remarks = request('rm');
        $monitor -> application_status_date = Carbon::now();
        $applicant->status = "rejected";
        $applicant->save();
        $monitor->save();
        Mail::to($applicant->email)->send(new RejectMail($applicant));
        return redirect('/applicants') ->with ('success', "Succesfully Rejected Application Number $applicant->application_no");

    }

}