import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

// La vidéo se termine à 85 % du scroll de la zone : la dernière image reste affichée un instant avant de libérer la page.
const END_AT = 0.85;
const FIRST_BATCH = 10;
// Recadrage horizontal de chaque côté de la vidéo (vide du studio), doit correspondre à l'aspect du canvas dans le Blade.
const CROP_X = 0.1;

export function initMembersScroll() {
    const wrap = document.getElementById('members-scroll');
    const canvas = document.getElementById('members-canvas');
    if (!wrap || !canvas) return;

    const ctx = canvas.getContext('2d');
    const frameCount = parseInt(wrap.dataset.frameCount, 10);
    const framePath = (i) => `${wrap.dataset.frames}/frame_${String(i + 1).padStart(4, '0')}.webp`;
    const frames = new Array(frameCount);
    let currentFrame = 0;

    function resizeCanvas() {
        const dpr = Math.min(window.devicePixelRatio || 1, 2);
        canvas.width = Math.round(canvas.clientWidth * dpr);
        canvas.height = Math.round(canvas.clientHeight * dpr);
        drawFrame(currentFrame);
    }

    // Image la plus proche déjà chargée, pour ne jamais laisser le canvas vide pendant le chargement.
    function nearestLoaded(index) {
        for (let i = index; i >= 0; i--) {
            if (frames[i]?.naturalWidth) return frames[i];
        }
        return null;
    }

    function drawFrame(index) {
        const img = nearestLoaded(index);
        if (!img) return;
        const cw = canvas.width, ch = canvas.height;
        const sx = img.naturalWidth * CROP_X;
        const sw = img.naturalWidth - sx * 2, sh = img.naturalHeight;
        // Cover sur la zone recadrée : remplit le canvas comme un tirage photo, sans bord.
        const scale = Math.max(cw / sw, ch / sh);
        const dw = sw * scale, dh = sh * scale;
        ctx.drawImage(img, sx, 0, sw, sh, (cw - dw) / 2, (ch - dh) / 2, dw, dh);
    }

    function loadFrame(i) {
        return new Promise((resolve) => {
            const img = new Image();
            img.decoding = 'async';
            img.onload = img.onerror = () => {
                frames[i] = img;
                if (i === currentFrame) drawFrame(currentFrame);
                resolve();
            };
            img.src = framePath(i);
        });
    }

    async function preload() {
        const first = [];
        for (let i = 0; i < Math.min(FIRST_BATCH, frameCount); i++) first.push(loadFrame(i));
        await Promise.all(first);
        drawFrame(currentFrame);
        for (let i = FIRST_BATCH; i < frameCount; i++) loadFrame(i);
    }

    // Ne charge les images qu'à l'approche de la section.
    const observer = new IntersectionObserver((entries) => {
        if (entries.some((e) => e.isIntersecting)) {
            observer.disconnect();
            preload();
        }
    }, { rootMargin: '150% 0px' });
    observer.observe(wrap);

    // La vidéo défile pendant que #members-track traverse le bas de l'écran (la vidéo est alors sticky en haut).
    const track = document.getElementById('members-track');
    ScrollTrigger.create({
        trigger: track,
        start: 'top bottom',
        end: 'bottom bottom',
        scrub: true,
        onUpdate: (self) => {
            const progress = Math.min(self.progress / END_AT, 1);
            const index = Math.min(Math.floor(progress * frameCount), frameCount - 1);
            if (index !== currentFrame) {
                currentFrame = index;
                requestAnimationFrame(() => drawFrame(currentFrame));
            }
        },
    });

    // Desktop : dès la fin de la vidéo, elle s'efface et les cartes (sticky elles aussi) apparaissent par-dessus,
    // puis restent fixées le temps de l'espaceur final.
    const frame = document.getElementById('members-frame');
    const cards = gsap.utils.toArray('#members-cards .member-card');
    const clips = cards.map((card) => card.querySelector('.member-clip'));

    // Le trombone glisse le long de son axe diagonal (depuis le haut à droite) et se clipse sur la photo.
    const clipFrom = { autoAlpha: 0, x: 45, y: -110 };
    const clipTo = { autoAlpha: 1, x: 0, y: 0, duration: 0.7, ease: 'back.out(1.6)' };

    // Entrée du cadre vidéo, une page après l'autre : feuille crème, puis la vidéo par-dessus, puis le trombone.
    gsap.timeline({
        scrollTrigger: { trigger: frame, start: 'top 75%', toggleActions: 'play none none reverse' },
    })
        .from(frame.querySelector('.members-sheet'), { autoAlpha: 0, y: 50, rotation: 5, duration: 0.7, ease: 'power3.out' })
        .from(canvas, { autoAlpha: 0, y: 70, rotation: -4, duration: 0.8, ease: 'power3.out' }, '-=0.35')
        .fromTo(frame.querySelector('.members-frame-clip'), clipFrom, clipTo, '-=0.2');

    const mm = gsap.matchMedia();
    mm.add('(min-width: 1024px)', () => {
        const heading = document.querySelector('#members-cards .members-heading');
        gsap.set(cards, { autoAlpha: 0, y: 30 });
        gsap.set(heading, { autoAlpha: 0, y: 20 });
        gsap.set(clips, clipFrom);
        const reveal = gsap.timeline({ paused: true })
            .to(frame, { autoAlpha: 0, scale: 0.96, duration: 0.4, ease: 'power2.out' })
            .to(heading, { autoAlpha: 1, y: 0, duration: 0.5, ease: 'power3.out' }, '-=0.2')
            .to(cards, { autoAlpha: 1, y: 0, duration: 0.6, stagger: 0.1, ease: 'power3.out' }, '-=0.3')
            .to(clips, { ...clipTo, stagger: 0.12 }, '<0.35');

        ScrollTrigger.create({
            trigger: track,
            // Se déclenche quand la vidéo atteint sa dernière image (END_AT de la hauteur du track).
            start: () => `bottom bottom+=${track.offsetHeight * (1 - END_AT)}`,
            onEnter: () => reveal.timeScale(1).play(),
            onLeaveBack: () => reveal.timeScale(1.5).reverse(),
        });
    });

    // Mobile / tablette : les cartes sont déjà visibles, seul le trombone se clipse quand la carte entre à l'écran.
    mm.add('(max-width: 1023px)', () => {
        clips.forEach((clip) => {
            gsap.fromTo(clip, clipFrom, {
                ...clipTo,
                scrollTrigger: { trigger: clip.closest('.member-card'), start: 'top 75%', toggleActions: 'play none none reverse' },
            });
        });
    });

    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();
}
