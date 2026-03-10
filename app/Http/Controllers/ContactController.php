<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        return view('pages.contact');
    }

    public function submit(ContactRequest $request) {
        $data = $request->validated();
        $data['user_id'] = auth()->check() ? auth()->user()->id : null;

        ContactMessage::create($data);

        return redirect()->back()->with('success', 'Message sent!');
    }
}
