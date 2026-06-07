<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\TagoQuoteRequestMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        $recipient = config('tago.contact_email');

        if (! $recipient) {
            return back()
                ->withInput($request->safe()->except('attachment'))
                ->withErrors([
                    'email' => 'De contactmailbox is nog niet ingesteld. Vul TAGO_CONTACT_EMAIL in voor echte aanvragen.',
                ]);
        }

        $validated = $request->validated();
        $attachmentPath = null;
        $attachmentName = null;

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $attachmentName = $file->getClientOriginalName();
            $attachmentPath = $file->store('tago-aanvragen', 'local');
        }

        Mail::to($recipient)->send(new TagoQuoteRequestMail(
            submission: $validated,
            attachmentPath: $attachmentPath,
            attachmentName: $attachmentName,
        ));

        return redirect()
            ->route('contact')
            ->with('status', 'Bedankt. Je aanvraag is goed ontvangen en kan nu persoonlijk opgevolgd worden.');
    }
}
