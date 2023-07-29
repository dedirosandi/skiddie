<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
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
    ]);

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

    // Mengirim email
    try {
        // Konfigurasi transport untuk mengirim email via SMTP
        $transport = new Swift_SmtpTransport('mail.skiddie.id', 465); // Ganti dengan alamat SMTP dan port yang sesuai
        $transport->setUsername('business@skiddie.id'); // Ganti dengan username SMTP Anda
        $transport->setPassword('Indonesia12345'); // Ganti dengan password SMTP Anda
        // Jika Anda ingin menggunakan SSL atau TLS, sesuaikan konfigurasi transport sesuai kebutuhan.

        // Membuat instance dari SwiftMailer
        $mailer = new Swift_Mailer($transport);

        // Membuat instance dari Swift_Message
        $message = new Swift_Message('New Contact Form Submission');
        $message->setFrom(['noreply@yourdomain.com' => 'Your Website Name']);
        $message->setTo(['business@skiddie.id']);
        $message->setBody('Name: '.$name."\n".
                         'Email: '.$email."\n".
                         'WhatsApp: '.$whatsapp."\n".
                         'Message: '.$message);

        // Mengirim email
        $result = $mailer->send($message);

        // Set flash message berdasarkan hasil pengiriman email
        if ($result > 0) {
            Session::flash('success', 'Your message has been sent successfully!');
        } else {
            Session::flash('error', 'Failed to send your message!');
        }
    } catch (\Exception $e) {
        // Jika terjadi kesalahan saat mengirim email, tangani kesalahan di sini
        Session::flash('error', 'Failed to send your message!');
    }

    // Redirect ke halaman konfirmasi atau halaman lain sesuai kebutuhan
    return redirect('/#contact-us');
}
}
