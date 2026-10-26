// Formulaire de contact envoyé sans rechargement (la page garde sa position et ses animations).
// Sans JavaScript, le formulaire fonctionne quand même en POST classique (retour sur #contact).
export function initContactForm() {
    const form = document.getElementById('contact-form');
    if (!form) return;

    const status = document.getElementById('contact-status');
    const button = form.querySelector('button[type="submit"]');
    const label = button.querySelector('[data-label]');

    const showStatus = (message, isError) => {
        status.textContent = message;
        status.classList.remove('hidden', 'border-scribe-green', 'bg-scribe-band/40', 'border-scribe-red', 'text-scribe-red');
        status.classList.add(...(isError ? ['border-scribe-red', 'text-scribe-red'] : ['border-scribe-green', 'bg-scribe-band/40']));
    };

    const clearErrors = () => {
        form.querySelectorAll('[data-error-for]').forEach((el) => (el.textContent = ''));
        form.querySelectorAll('[aria-invalid]').forEach((el) => el.removeAttribute('aria-invalid'));
    };

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        clearErrors();
        button.disabled = true;
        label.textContent = 'Envoi…';

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: { Accept: 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
            });
            const data = await response.json().catch(() => ({}));

            if (response.ok) {
                // Message de confirmation à la place des champs
                form.querySelector('.contact-fields').remove();
                form.querySelector('.contact-actions').remove();
                showStatus(data.message, false);
                status.focus?.();
                return;
            }

            if (response.status === 422 && data.errors) {
                Object.entries(data.errors).forEach(([field, messages]) => {
                    const error = form.querySelector(`[data-error-for="${field}"]`);
                    const input = form.querySelector(`[name="${field}"]`);
                    if (error) error.textContent = messages[0];
                    input?.setAttribute('aria-invalid', 'true');
                });
                form.querySelector('[aria-invalid="true"]')?.focus();
                status.classList.add('hidden');
            } else if (response.status === 429) {
                showStatus('Trop d\'envois en peu de temps. Merci de patienter une minute avant de réessayer.', true);
            } else {
                showStatus(data.message ?? 'Une erreur est survenue. Merci de réessayer ou de nous appeler.', true);
            }
        } catch {
            showStatus('Connexion impossible. Vérifiez votre connexion internet puis réessayez.', true);
        }

        button.disabled = false;
        label.textContent = 'Envoyer';
    });
}
