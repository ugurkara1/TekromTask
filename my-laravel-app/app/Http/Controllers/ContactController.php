<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Form validasyonu
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $details = $request->all();

        try {
            // Gmail üzerinden gönderim yapmayı dene
            Mail::mailer('smtp')->to('info@elselif.com')->send(new ContactMail($details));
            return back()->with('success', 'Message sent successfully via Gmail!');
        } catch (\Exception $e) {
            // Gmail başarısız olursa Mailtrap'e düş
            try {
                Mail::mailer('failover')->to('info@elselif.com')->send(new ContactMail($details));
                return back()->with('success', 'Message sent successfully via Mailtrap!');
            } catch (\Exception $e) {
                return back()->with('error', 'Failed to send message via both Gmail and Mailtrap. Please try again later.');
            }
        }
    }
}
