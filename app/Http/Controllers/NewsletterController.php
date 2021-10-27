<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;

class NewsletterController
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);

        try {
            //$newsletter = New \App\Services\Newsletter();
            $newsletter->subscribe(request('email')); //fonction dans Services Newsletter
        } catch (\Exception $e) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This email could not be added to our list'
            ]);
        }


        return redirect('/')->with('success', 'you are now signed in for our newsletter');

    }
}
