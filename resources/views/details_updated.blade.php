

<?php
use App\Applicant;

$applicant = $single_record;
// dd($applicant);
        
        $pdf = PDF::loadView('mypdf',compact('applicant'));
        $fileName ="";
        try{
            $fileName = $applicant->register_no;
        }
        catch(Exception $e)
        {
            $fileName = 'myInfo';
        }
        // return $pdf->download($fileName.'.pdf');
        return $pdf->stream($fileName.'.pdf');

?>