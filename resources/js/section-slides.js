import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

// Chaque section (sauf le hero et le pied de page) entre en glissant horizontalement, en quinconce : droite, gauche, droite…
export function initSectionSlides() {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    const sections = gsap.utils.toArray('body > section:not(#accueil)');

    sections.forEach((section, i) => {
        const from = i % 2 === 0 ? 1 : -1;

        gsap.from(section, {
            xPercent: 100 * from,
            duration: 1.1,
            ease: 'power3.out',
            // Retire le transform une fois arrivée : rien ne doit gêner les éléments sticky de la section équipe.
            clearProps: 'transform',
            scrollTrigger: { trigger: section, start: 'top 90%', once: true },
        });
    });

    // Secteurs : comme pour les portraits, chaque trombone glisse le long de son axe (depuis le haut à gauche) et se clipse
    // sur sa feuille quand celle-ci entre à l'écran.
    gsap.utils.toArray('.secteur-clip').forEach((clip) => {
        gsap.fromTo(
            clip,
            // Repère du trombone (image dans une enveloppe tournée) : glissement depuis la partie verte (haut-droite)
            { autoAlpha: 0, x: 80, y: -90 },
            {
                autoAlpha: 1,
                x: 0,
                y: 0,
                duration: 0.7,
                ease: 'back.out(1.6)',
                scrollTrigger: { trigger: clip.closest('figure'), start: 'top 75%', toggleActions: 'play none none reverse' },
            },
        );
    });

    // Contact : le trombone de la feuille du formulaire se clipse comme ceux des portraits (depuis le haut à droite).
    const contactClip = document.querySelector('.contact-clip');
    if (contactClip) {
        gsap.fromTo(
            contactClip,
            { autoAlpha: 0, x: 45, y: -110 },
            {
                autoAlpha: 1,
                x: 0,
                y: 0,
                duration: 0.7,
                ease: 'back.out(1.6)',
                scrollTrigger: { trigger: '#contact-form', start: 'top 75%', toggleActions: 'play none none reverse' },
            },
        );
    }

    // Pied de page (fixe, sans glissement horizontal) : logo, adresse puis téléphone montent nettement en apparaissant.
    const footer = document.getElementById('coordonnees');
    if (footer) {
        gsap.from(footer.children, {
            y: 140,
            autoAlpha: 0,
            duration: 1.2,
            stagger: 0.2,
            ease: 'power3.out',
            scrollTrigger: { trigger: footer, start: 'top 80%', once: true },
        });
    }
}
