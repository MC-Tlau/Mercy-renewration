<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;


class ContactController extends Controller
{
    public function create()
    {
        // dd(request()->all());
        $data = request()->all();
        // dd($data);
        Mail::to('testing@gmail.com')->send(new ContactFormMail($data));
        return redirect('/');
    }
}
