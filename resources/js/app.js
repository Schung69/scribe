const menuToggle = document.getElementById('menu-toggle');
const menuClose = document.getElementById('menu-close');
const menuPanel = document.getElementById('menu-panel');

if (menuToggle && menuPanel) {
    const openMenu = () => {
        menuPanel.classList.remove('hidden');
        menuPanel.classList.add('flex');
        menuToggle.setAttribute('aria-expanded', 'true');
    };

    const closeMenu = () => {
        menuPanel.classList.add('hidden');
        menuPanel.classList.remove('flex');
        menuToggle.setAttribute('aria-expanded', 'false');
    };

    menuToggle.addEventListener('click', openMenu);
    menuClose?.addEventListener('click', closeMenu);
    menuPanel.querySelectorAll('a').forEach((link) => link.addEventListener('click', closeMenu));
}
