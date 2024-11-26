document.addEventListener('DOMContentLoaded', function() {
    const open = document.getElementById('nav_open');
    const menu = document.getElementById('nav_menu');
    open.addEventListener('click', function() {
        menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    });

    const close = document.getElementById('nav_close');
    close.addEventListener('click', function() {
        menu.style.display = 'none';
    });
});