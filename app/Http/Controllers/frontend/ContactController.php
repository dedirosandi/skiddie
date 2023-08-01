<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use ReCaptcha\ReCaptcha;
use App\Models\frontend\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class ContactController extends Controller
{
    //
   public function send(Request $request)
{
    // Validasi data yang dikirim dari form
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'whatsapp' => 'required|string|max:15', // Ubah sesuai dengan aturan nomor WhatsApp
        'message' => 'required|string',
        'g-recaptcha-response' => 'required', // Menambahkan validasi reCAPTCHA
    ]);

    // Verifikasi reCAPTCHA
    $recaptcha = new ReCaptcha('6LdUAXEnAAAAAI0oDxcWFrn-KuFvVgXMPOOnt34D');
    $response = $recaptcha->verify($request->input('g-recaptcha-response'), $request->ip());

    if (!$response->isSuccess()) {
        // Jika reCAPTCHA tidak valid, kembalikan ke halaman form dengan pesan error
        // return redirect()->back()->with('error', 'Please verify that you are not a robot.');
        return redirect('/#contact-us')->with('error', 'Please verify that you are not a robot.');
    }

    // Proses data yang dikirim dari form
    $name = $request->input('name');
    $email = $request->input('email');
    $whatsapp = $request->input('whatsapp');
    $message = $request->input('message');

    // Simpan data ke dalam model Contact
    try {
        $contact = new Contact();
        $contact->name = $name;
        $contact->email = $email;
        $contact->whatsapp = $whatsapp;
        $contact->message = $message;
        $contact->save();

        Session::flash('success', 'Your message has been sent successfully!');
    } catch (QueryException $e) {
        // Jika terjadi kesalahan saat menyimpan data, tangani kesalahan di sini
        Session::flash('error', 'Your message has been sent Failed!');
    }
    // Redirect ke halaman konfirmasi atau halaman lain sesuai kebutuhan
    return redirect('/#contact-us');
}
}
