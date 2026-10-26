import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

// Position horizontale de l'objectif dans camera.png (bord gauche / droit, en fraction de la largeur)
const LENS = { left: 0.302, right: 0.572 };
const LENS_OVERFLOW = 20; // px dont le haut de l'objectif dépasse le bord du bandeau vert

// L'objectif doit dépasser de 10 px le bord diagonal du bandeau : la hauteur de ce bord sous l'objectif dépend
// de la largeur d'écran (et du conteneur plafonné), on calcule donc la marge haute de l'image.
function initLensOverflow(camera) {
    const section = camera.closest('section');

    function update() {
        camera.style.marginTop = '';
        const img = camera.getBoundingClientRect();
        const rect = section.getBoundingClientRect();
        const diag = -parseFloat(getComputedStyle(section).marginTop);
        // Position de l'objectif relative à la section : insensible au glissement horizontal des sections (section-slides)
        const lensX = img.left - rect.left + img.width * ((LENS.left + LENS.right) / 2);

        // diag-rev : le bord haut va de 0 (à gauche) à --diag (à droite)
        const bandTop = rect.top + (diag * lensX) / rect.width;
        const shift = bandTop - LENS_OVERFLOW - img.top; // > 0 : l'image doit descendre
        const current = parseFloat(getComputedStyle(camera).marginTop);
        camera.style.marginTop = `${current + shift}px`;
    }

    // La marge change la hauteur de la section : les déclencheurs de scroll plus bas doivent être recalculés
    const updateAndRefresh = () => {
        update();
        ScrollTrigger.refresh();
    };

    let frame;
    const schedule = () => {
        cancelAnimationFrame(frame);
        frame = requestAnimationFrame(updateAndRefresh);
    };

    if (camera.complete) update();
    camera.addEventListener('load', updateAndRefresh);
    window.addEventListener('resize', schedule);
}

// Le texte « Notre conviction » sort de l'objectif : chaque bloc monte depuis le bas en apparaissant,
// une fois l'appareil photo bien visible à l'écran (sinon l'effet « sortie de l'objectif » ne se voit pas).
function initConvictionReveal(block, camera) {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    gsap.from(block.children, {
        y: 140,
        scale: 0.92,
        autoAlpha: 0,
        transformOrigin: '50% 100%',
        duration: 1.1,
        stagger: 0.18,
        ease: 'power3.out',
        // Déclenché quand la moitié de l'appareil est entrée dans l'écran
        scrollTrigger: { trigger: camera ?? block, start: camera ? 'center bottom' : 'top 80%', once: true },
    });
}

export function initCamera() {
    const camera = document.getElementById('camera');
    const conviction = document.getElementById('conviction');
    if (camera) initLensOverflow(camera);
    if (conviction) initConvictionReveal(conviction, camera);
}
