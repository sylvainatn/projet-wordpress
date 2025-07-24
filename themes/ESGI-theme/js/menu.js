document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');
    const menuClose = document.getElementById('menu-close');
    const dropdownMenu = document.getElementById('dropdown-menu');
    
    if (menuToggle && dropdownMenu) {
        // Ouvrir le menu au clic sur le bouton hamburger
        menuToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownMenu.classList.add('show');
        });
        
        // Fermer le menu au clic sur le bouton de fermeture
        if (menuClose) {
            menuClose.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdownMenu.classList.remove('show');
            });
        }
        
        // Fermer le menu si on clique ailleurs
        document.addEventListener('click', function(e) {
            if (!dropdownMenu.contains(e.target) && !menuToggle.contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
        
        // Fermer le menu au scroll
        // window.addEventListener('scroll', function() {
        //     dropdownMenu.classList.remove('show');
        // });
        
        // Fermer le menu avec la touche Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                dropdownMenu.classList.remove('show');
            }
        });
    }
});
