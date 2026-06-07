<?php

namespace Tests\Feature;

use App\Mail\TagoQuoteRequestMail;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ContactRequestTest extends TestCase
{
    public function test_contact_form_validates_required_fields(): void
    {
        $this->post('/contact', [])
            ->assertSessionHasErrors(['name', 'email', 'table_type', 'message']);
    }

    public function test_contact_form_requires_configured_recipient(): void
    {
        config(['tago.contact_email' => null]);

        $this->from('/contact')->post('/contact', $this->validPayload())
            ->assertRedirect('/contact')
            ->assertSessionHasErrors('email');
    }

    public function test_contact_form_sends_mail_and_stores_upload_privately(): void
    {
        config(['tago.contact_email' => 'atelier@example.test']);
        Mail::fake();
        Storage::fake('local');

        $file = UploadedFile::fake()->image('ruimte.jpg', 1200, 800)->size(640);

        $this->post('/contact', $this->validPayload(['attachment' => $file]))
            ->assertRedirect('/contact')
            ->assertSessionHas('status');

        $storedPath = null;

        Mail::assertSent(TagoQuoteRequestMail::class, function (TagoQuoteRequestMail $mail) use (&$storedPath) {
            $storedPath = $mail->attachmentPath;

            return $mail->hasTo('atelier@example.test')
                && $mail->submission['name'] === 'Sande Test'
                && str_starts_with((string) $mail->attachmentPath, 'tago-aanvragen/');
        });

        Storage::disk('local')->assertExists($storedPath);
    }

    public function test_contact_form_rejects_unsafe_upload_type(): void
    {
        config(['tago.contact_email' => 'atelier@example.test']);

        $file = UploadedFile::fake()->create('plan.pdf', 128, 'application/pdf');

        $this->post('/contact', $this->validPayload(['attachment' => $file]))
            ->assertSessionHasErrors('attachment');
    }

    private function validPayload(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Sande Test',
            'email' => 'sande@example.test',
            'phone' => '0470000000',
            'table_type' => 'eettafel',
            'dimensions' => '240 x 100 cm',
            'style' => 'japandi',
            'wood_color' => 'naturel-eik',
            'message' => 'We zoeken een warme maatwerktafel voor onze leefruimte.',
        ], $overrides);
    }
}
