<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return back();
        }

        return view('index');
    }

    public function about()
    {
        return view('normal-view.pages.about');
    }

    public function contact()
    {
        return view('normal-view.pages.contact');
    }

    public function sendFeedback(Request $request)
    {
        $request->validate([
            'name'                      =>          ['required', 'max:255'],
            'message'                   =>          ['required'],
            'email'                     =>          ['required', 'max:255', 'email']
        ]);

        Feedback::create($request->all());

        return redirect('/contact-us')->with('message', 'Your feedback was sent. Thank You!');
    }
}
