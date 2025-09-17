/*	Name of screen: 	sidebar.js
	Purpose of screen: 	Javascript for the sidebar
	Student ID:			C00166672
	Name:				Mark Mukiiza
	Date Written:		March 2025
*/
document.addEventListener('DOMContentLoaded', function () {
      // ===== SIDEBAR =====
      const burger = document.querySelector('.burger-menu');
      const sidebar = document.querySelector('.sidebar');

      // Toggle sidebar on burger click
      burger.addEventListener('click', (e) => {
        e.stopPropagation();
        sidebar.classList.toggle('open');
      });

      // Close sidebar when clicking outside
      document.addEventListener('click', (e) => {
        if (!sidebar.contains(e.target) && !e.target.classList.contains('burger-menu')) {
          sidebar.classList.remove('open');
        }
      });

      // ===== DROPDOWNS =====
      const dropdowns = document.querySelectorAll('.dropdown');
      let activeDropdown = null;

      dropdowns.forEach(dropdown => {
        const content = dropdown.querySelector('.dropdown-content');

        // Show dropdown on hover
        dropdown.addEventListener('mouseenter', () => {
          if (activeDropdown) {
            activeDropdown.classList.remove('visible');
          }
          content.classList.add('visible');
          activeDropdown = content;
        });

        // Hide dropdown with delay
        dropdown.addEventListener('mouseleave', () => {
          setTimeout(() => {
            if (!content.matches(':hover')) {
              content.classList.remove('visible');
              activeDropdown = null;
            }
          }, 10);
        });

        // Keep dropdown open when hovering its content
        content.addEventListener('mouseenter', () => {
          clearTimeout();
          content.classList.add('visible');
        });

        // Hide dropdown when leaving its content
        content.addEventListener('mouseleave', () => {
          content.classList.remove('visible');
          activeDropdown = null;
        });
      });
    });