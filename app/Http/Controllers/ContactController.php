<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;
use App\Models\AnimalModel;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __construct(ContactModel $contactModel, AnimalModel $animalModel)
    {
        $this->ContactModel = $contactModel;
        $this->AnimalModel = $animalModel;
    }

    public function index()
    {
        $breadcrumb[] = [
            'name' => '聯絡我們',
            'active' => 'active'
        ];

        $info = $this->AnimalModel->find(1)->first();

        return view('contact/contact', [
            'info' => $info,
            'breadcrumb' => $breadcrumb
        ]);
    }

    public function send(ContactRequest $request)
    {
        $info = $this->AnimalModel->find(1)->first();

        $mail_data = [
            'recipient' => $info->email,
            'subject' => 'ＯＯＯ貓狗寵物水族館---您的網站有一封聯絡我們信件',
            'name' => $request->name,
            'tel' => $request->tel,
            'email' => $request->email,
            'notes' => $request->notes
        ];

        Mail::send('contact/email_template', $mail_data, function($message) use($mail_data) {
            $message->to($mail_data['recipient'])
                    ->from($mail_data['email'], $mail_data['name'])
                    ->subject($mail_data['subject']);
        });
    }
}
