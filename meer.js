function toggleDropDown() {
    const dropMenu = document.getElementById('nav-dropdown');

    if (dropMenu.dataset.state == 'closed') {
        dropMenu.dataset.state = 'open';
        dropMenu.style.top = '50px';
    } else if (dropMenu.dataset.state == 'open') {
        dropMenu.dataset.state = 'closed';
        dropMenu.style.top = '-1500px';
    }
    window.addEventListener('scroll', () => {
        dropMenu.dataset.state = 'closed';
        dropMenu.style.top = '-1500px';
    });
}