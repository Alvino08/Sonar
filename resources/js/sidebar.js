document.addEventListener('DOMContentLoaded', function () {
  const menuToggle = document.getElementById('menuToggle');
  const sidebarMenu = document.getElementById('sidebarMenu');
  const closeMenu = document.getElementById('closeMenu');

  if (menuToggle && sidebarMenu && closeMenu) {
    menuToggle.addEventListener('click', () => {
      sidebarMenu.classList.remove('-translate-x-full');
    });

    closeMenu.addEventListener('click', () => {
      sidebarMenu.classList.add('-translate-x-full');
    });
  }
});
