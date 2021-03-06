<?php

namespace App\Http\Controllers;
use App\Applicant;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchall(Request $request)
    {
        $request->validate([
            'query' => 'required|min:2',
        ]);

        $query = $request->input('query');
        $persons = Applicant::where('application_no', 'like', '%'.$query.'%')
        ->orwhere('family_head', 'like', '%'.$query.'%')
        ->paginate(9);
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

        return view('/search-all', compact('persons'));
    }

    public function searchDcso(Request $request)
    {
        $request->validate([
            'query' => 'required',
        ]);

        $query = $request->input('query');
        // dd($query);
        $status = "submitted";
        $results = Applicant::where('application_no', 'like', '%'.$query.'%')
        -> where ('status', 'submitted')->orwhere('status', 'Pending Signature')
        ->orwhere('family_head', 'like', '%'.$query.'%')
        -> where ('status', 'submitted')->orwhere('status', 'Pending Signature')
        ->paginate(9);
        // return($results);
        return view('/search-results', compact('results', 'status'));
    }

    public function searchClerk(Request $request)
    {
        $request->validate([
            'query' => 'required',
        ]);

        $query = $request->input('query');
        $status = "forwarded";
        
        $results = Applicant::where('application_no', 'like', '%'.$query.'%')
        -> where ('status', 'forwarded')
        ->orwhere('family_head', 'like', '%'.$query.'%')
        -> where ('status', 'forwarded')
        ->paginate(9);
        // return($results);
        return view('/search-results', compact('results','status'));
    }
}
