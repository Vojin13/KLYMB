<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactMessages = ContactMessage::query()
            ->orderBy('is_answered')
            ->orderBy('updated_at', 'desc')
            ->paginate(15);

        return view('admin.contactMessages.index', ['messages' => $contactMessages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cm = ContactMessage::find($id);

        if (!$cm) {
            abort(404, "Contact message not found");
        }

        return view('admin.contactMessages.show', ['message' => $cm]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'answer' => 'required|string|min:5',
        ]);

        $cm = ContactMessage::find($id);

        if(!$cm){
            abort(404,"Contact message not found");
        }

        if($cm->is_answered){
            return redirect()->route('admin.messages.index')->with('error', 'This message has already been answered.');
        }

        $email = $cm->user?->email ?? $cm->email;
        $info = 'ID: '. $cm->id . ' | From: ' . $email;

        $cm->answer = $data['answer'];
        $cm->is_answered = true;
        $cm->save();

        return redirect()->route('admin.messages.index')->with('message', 'Message '. $info .' updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cm = ContactMessage::find($id);

        if (!$cm) {
            abort(404, "Contact message not found");
        }

        $info = 'ID: '. $cm->id . ' | From: ' . $cm->email;
        $cm->delete();
        return redirect()->route('admin.messages.index')->with('message', 'Message: ' .$info . ' deleted successfully!');
    }
}
