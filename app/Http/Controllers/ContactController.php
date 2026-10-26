<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessage;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    private const SUCCESS = 'Merci, votre message est bien parti. Nous vous répondons très vite.';

    private const MIN_SECONDS = 3; // un humain met plus de 3 s à remplir le formulaire

    public function store(ContactRequest $request): JsonResponse|RedirectResponse
    {
        // Robot : on fait comme si tout s'était bien passé, sans rien envoyer
        if (! $this->looksHuman($request)) {
            return $this->respond($request, self::SUCCESS);
        }

        $data = $request->safe()->only(['nom', 'email', 'telephone', 'societe', 'message']);
        $recipients = config('services.contact.recipients');

        try {
            Mail::to($recipients)->send(new ContactMessage($data));
        } catch (\Throwable $e) {
            Log::error('Formulaire de contact : envoi impossible', ['exception' => $e->getMessage()]);

            return $this->respond($request, 'Désolé, le message n\'a pas pu être envoyé. Vous pouvez nous appeler au +33 (0)3 88 14 31 79.', 500);
        }

        return $this->respond($request, self::SUCCESS);
    }

    private function looksHuman(ContactRequest $request): bool
    {
        if ($request->filled('site_web')) {
            return false;
        }

        try {
            $startedAt = (int) Crypt::decryptString((string) $request->input('form_time'));
        } catch (DecryptException) {
            return false;
        }

        return now()->timestamp - $startedAt >= self::MIN_SECONDS;
    }

    private function respond(ContactRequest $request, string $message, int $status = 200): JsonResponse|RedirectResponse
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $message], $status);
        }

        return redirect(url('/').'#contact')
            ->with($status === 200 ? 'contact_status' : 'contact_error', $message)
            ->withInput($status === 200 ? [] : $request->except(['site_web', 'form_time']));
    }
}
