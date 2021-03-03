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
            if ($persons[$i]->status == "submitted")
            {
                $persons[$i]->status = "";
            }

            else if ($persons[$i]->status == "rejected" )
            {
                $persons[$i]->status = "No";
            }
               
            else
            {
                $persons[$i]->status = "Yes";
            }         

        }

        return view('monitoring')->with('persons', $persons);

    }
}
