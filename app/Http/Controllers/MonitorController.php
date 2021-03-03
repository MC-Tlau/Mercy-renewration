<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use Carbon\Carbon;

class MonitorController extends Controller
{
    public function index()
    {
        $persons =  Applicant::paginate(9);
        for ($i = 0; $i < count($persons); $i++)
        {
            if ($persons[$i]->status == "rejected" )
            {
                $persons[$i]->status = "No";
            }
            else if ($persons[$i]->status == "forwarded" || $persons[$i]->status == "renewed")
            {
                $persons[$i]->status = "Yes";

            }   
            else
            {
                $persons[$i]->status = "";
            }         

        }

        return view('monitoring')->with('persons', $persons);

    }
}
