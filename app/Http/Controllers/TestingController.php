<?php

namespace App\Http\Controllers;

use App\testing;
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
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

    /**
     * Display the specified resource.
     *
     * @param  \App\testing  $testing
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $single_record =  Testing::find($id);
        // dd($single_record);
        // $filename = $single_record->scanned_documents;
        // // dd($filename);
        // $file_path1 = public_path()."/storage/documents/". $filename;
        // $file_path2 = "/storage/documents/". $filename;
   
        //  if (file_exists($file_path2)) 
        //     { 
        //         // Send Download
        //         return Response::download($file_path1, $filename, [ 
        //             'Content-Length: '. filesize($file_path1) 
        //         ]); 
        //     } 
        //     else 
        //     { 
        //         // Error 
        //         exit('Requested file does not exist on our server!'); 
        //     }  
            return view('download')->with('single_record', $single_record);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\testing  $testing
     * @return \Illuminate\Http\Response
     */
    public function edit(testing $testing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\testing  $testing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, testing $testing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\testing  $testing
     * @return \Illuminate\Http\Response
     */
    public function destroy(testing $testing)
    {
        //
    }

    public function download($id){

        //Carbon
        $applicant = Applicant:: find($id);
        
        $pdf = PDF::loadView('rationcard',compact('applicant'));
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
}
