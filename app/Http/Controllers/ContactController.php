<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        return view('pages.contact');
    }

    public function submit(ContactRequest $request) {
        $input = $request->all();

        return $input;
    }
}
