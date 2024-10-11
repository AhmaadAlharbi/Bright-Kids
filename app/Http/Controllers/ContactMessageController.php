<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(10);
        return view('contact_messages.index', compact('messages'));
    }
    public function show(ContactMessage $message)
    {
        $message->update(['read' => true]);
        return view('contact_messages.show', compact('message'));
    }
    public function markAsRead(ContactMessage $message)
    {
        $message->update(['read' => true]);
        return redirect()->back()->with('success', 'Message marked as read.');
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validatedData);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()->route('admin.contact-messages.index')->with('success', 'Message deleted successfully.');
    }
}