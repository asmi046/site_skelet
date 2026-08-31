<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::allFromCacheName();

        return view('contacts', [
            'title' => 'Контакты',
            'contacts' => [
                'adress' => $contacts->get('adress')?->value,
                'phone' => $contacts->get('phone')?->value,
                'phone_2' => $contacts->get('phone_2')?->value,
                'email' => $contacts->get('email')?->value,
                'geo' => $contacts->get('geo')?->value,
                'work_time' => $contacts->get('work_time')?->value,
            ],
        ]);
    }
}
