<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
            'telephone' => ['nullable', 'string', 'max:30'],
            'societe' => ['nullable', 'string', 'max:150'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            // Anti-spam : champ piège invisible et horodatage chiffré (vérifiés dans le contrôleur)
            'site_web' => ['nullable', 'string'],
            'form_time' => ['nullable', 'string'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nom.required' => 'Merci d\'indiquer votre nom.',
            'email.required' => 'Merci d\'indiquer votre adresse e-mail.',
            'email.email' => 'Cette adresse e-mail ne semble pas valide.',
            'message.required' => 'Merci d\'écrire votre message.',
            'message.min' => 'Votre message est un peu court (10 caractères minimum).',
            '*.max' => 'Ce champ est trop long.',
        ];
    }

    /**
     * Sans JavaScript, on revient sur le formulaire (ancre #contact) avec les erreurs.
     */
    protected function getRedirectUrl(): string
    {
        return url()->previous().'#contact';
    }
}
