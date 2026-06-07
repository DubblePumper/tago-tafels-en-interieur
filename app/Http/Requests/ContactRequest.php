<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email:rfc', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
            'table_type' => ['required', Rule::in(['eettafel', 'salontafel', 'bijzettafel', 'interieur', 'ander'])],
            'dimensions' => ['nullable', 'string', 'max:120'],
            'style' => ['nullable', Rule::in(['industrieel', 'landelijk-modern', 'japandi', 'luxe-modern', 'nog-onzeker'])],
            'wood_color' => ['nullable', Rule::in(['naturel-eik', 'donker-eik', 'gerookt', 'zwart', 'nog-onzeker'])],
            'attachment' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'message' => ['required', 'string', 'max:2000'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'naam',
            'email' => 'e-mail',
            'phone' => 'telefoon',
            'table_type' => 'type tafel',
            'dimensions' => 'gewenste afmetingen',
            'style' => 'stijl',
            'wood_color' => 'houtkleur',
            'attachment' => 'foto of plan',
            'message' => 'bericht',
        ];
    }
}
