<?php

use Illuminate\Support\Facades\Route;
use App\Mail\MyTestEmail;
use App\Mail\MyTestFileEmail;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});


Route::get('send-gmail', function() {
    $name = "Funny Coder";
    Mail::to('test@gmail.com')->send(new MyTestEmail($name));

    return 'Sent email';
});

Route::get('send-gmail-multi', function() {
    $emails = ['first@example.com', 'second@example.com', 'third@example.com'];
    $name = "Funny Coder"; // Assuming you want to send the same content to all

    Mail::to($emails)->send(new MyTestEmail($name));

    return 'Sent email';
});

Route::get('send-gmail-cc-bc', function() {
    $mainRecipients = ['main1@example.com', 'main2@example.com'];
    $ccRecipients = ['cc1@example.com', 'cc2@example.com'];
    $bccRecipients = ['secret1@example.com', 'secret2@example.com'];
    $name = "Funny Coder";

    Mail::to($mainRecipients)
        ->cc($ccRecipients)
        ->bcc($bccRecipients)
        ->send(new MyTestEmail($name));

    return 'Sent email';
});

Route::get('send-gmail-attachment', function() {
    $name = "Funny Coder";
    $filePath = public_path('Hello.docx');

    Mail::to('test@gmail.com')->send(new MyTestFileEmail($name, $filePath));

    return 'Sent email';
});
