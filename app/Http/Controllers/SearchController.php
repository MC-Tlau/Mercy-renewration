<?php

namespace App\Http\Controllers;
use App\Applicant;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchall(Request $request)
    {
        $request->validate([
            'query' => 'required',
        ]);

        $query = $request->input('query');
        $persons = Applicant::where('application_no', 'like', '%'.$query.'%')->paginate(9);
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
        $results = Applicant::where('application_no', 'like', '%'.$query.'%') -> where ('status', 'submitted')->orWhere('status', 'Pending Signature')->paginate(9);
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
        
        $results = Applicant::where('application_no', 'like', '%'.$query.'%') -> where ('status', 'forwarded')->paginate(9);
        // return($results);
        return view('/search-results', compact('results','status'));
    }
}
