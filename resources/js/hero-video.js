// Showreel du hero : lancé muet (seule lecture automatique autorisée par les navigateurs), le bouton active/coupe le son.
export function initHeroVideo() {
    const video = document.getElementById('hero-video');
    const button = document.getElementById('hero-sound');
    if (!video || !button) return;

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        video.removeAttribute('autoplay');
        video.pause();
    }

    const icons = {
        muted: button.querySelector('[data-icon="muted"]'),
        sound: button.querySelector('[data-icon="sound"]'),
    };

    const render = () => {
        const on = !video.muted;
        button.setAttribute('aria-pressed', String(on));
        button.setAttribute('aria-label', on ? 'Couper le son de la vidéo' : 'Activer le son de la vidéo');
        icons.muted.classList.toggle('hidden', on);
        icons.sound.classList.toggle('hidden', !on);
    };

    button.addEventListener('click', () => {
        video.muted = !video.muted;
        // Activer le son relance aussi la vidéo si elle était en pause (mouvement réduit, lecture bloquée…)
        if (!video.muted && video.paused) video.play().catch(() => {});
        render();
    });

    render();
}
