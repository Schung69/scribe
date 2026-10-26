import { gsap } from 'gsap';

const LETTER_DELAY = 0.05;

// Remplace chaque caractère des nœuds texte par un <span>, en conservant les balises (<br>…) et donc leur style.
// Les éléments [data-reveal] ont leur propre animation et ne sont pas découpés.
function splitLetters(node) {
    const letters = [];
    [...node.childNodes].forEach((child) => {
        if (child.nodeType === Node.ELEMENT_NODE) {
            if (child.hasAttribute('data-reveal')) return;
            letters.push(...splitLetters(child));
            return;
        }
        if (child.nodeType !== Node.TEXT_NODE) return;

        const fragment = document.createDocumentFragment();
        for (const char of child.textContent) {
            // Les espaces restent des nœuds texte pour que les retours à la ligne se fassent entre les mots.
            if (/\s/.test(char)) {
                fragment.append(char);
                continue;
            }
            const span = document.createElement('span');
            span.textContent = char;
            span.setAttribute('aria-hidden', 'true');
            fragment.append(span);
            letters.push(span);
        }
        child.replaceWith(fragment);
    });
    return letters;
}

// « le verbe » grésille de temps en temps comme une lampe instable : quelques coupures brèves et irrégulières, puis une pause aléatoire.
function flicker(el) {
    const random = gsap.utils.random;
    const tl = gsap.timeline({
        onComplete: () => gsap.delayedCall(random(2.5, 6), () => flicker(el)),
    });
    const cuts = random(2, 4, 1);
    for (let i = 0; i < cuts; i++) {
        tl.to(el, { opacity: random(0.1, 0.45), duration: random(0.03, 0.07), ease: 'none' })
            .to(el, { opacity: 1, duration: random(0.04, 0.1), ease: 'none' }, `+=${random(0.02, 0.12)}`);
    }
}

export function initHeroIntro() {
    const title = document.getElementById('hero-title');
    const clip = document.getElementById('hero-clip');
    if (!title) return;

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        title.classList.add('is-ready');
        return;
    }

    title.setAttribute('aria-label', title.textContent.replace(/\s+/g, ' ').trim());
    const letters = splitLetters(title);
    const zoomed = title.querySelector('[data-reveal="zoom"]');
    const dot = title.querySelector('[data-reveal="dot"]');

    const caret = document.createElement('span');
    caret.className = 'type-caret';
    caret.setAttribute('aria-hidden', 'true');

    gsap.set(letters, { autoAlpha: 0 });
    gsap.set(zoomed, { autoAlpha: 0, scale: 0.3 });
    gsap.set(dot, { autoAlpha: 0, x: 220 });
    if (clip) gsap.set(clip, { autoAlpha: 0, y: -260 });
    title.classList.add('is-ready');

    const typingDuration = letters.length * LETTER_DELAY;

    gsap.timeline({ delay: 0.4 })
        .to(letters, {
            autoAlpha: 1,
            duration: 0.01,
            stagger: {
                each: LETTER_DELAY,
                // Le curseur suit la dernière lettre écrite (il passe dans le <em> avec elle).
                onStart() {
                    this.targets()[0].after(caret);
                },
            },
        })
        // Le curseur s'efface quand « le verbe » surgit en zoom, puis le point arrive en glissant depuis la droite.
        .to(caret, { autoAlpha: 0, duration: 0.2 }, '+=0.15')
        .add(() => caret.remove())
        .to(zoomed, { autoAlpha: 1, scale: 1, duration: 0.7, ease: 'back.out(2)' }, '<')
        .to(dot, { autoAlpha: 1, x: 0, duration: 0.6, ease: 'power3.out' }, '-=0.15')
        .add(() => gsap.delayedCall(1.5, () => flicker(zoomed)))
        .to(clip, { autoAlpha: 1, y: 0, duration: 0.9, ease: 'back.out(1.4)' }, typingDuration * 0.75);
}
