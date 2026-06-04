import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('admin-sidebar');
    const toggleBtn = document.getElementById('sidebar-toggle');

    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', function () {
            sidebar.classList.toggle('collapsed');
        });
    }

    // Dropdown toggles
    document.querySelectorAll('.dropdown-toggle').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            var menu = this.nextElementSibling;
            while (menu && !menu.classList.contains('dropdown-menu')) {
                menu = menu.nextElementSibling;
            }
            if (!menu) return;
            var isOpen = menu.classList.contains('show');
            document.querySelectorAll('.dropdown-menu.show').forEach(function (m) {
                m.classList.remove('show');
                m.classList.add('hidden');
            });
            if (!isOpen) {
                menu.classList.remove('hidden');
                menu.classList.add('show');
            }
        });
    });
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown-menu.show').forEach(function (m) {
                m.classList.remove('show');
                m.classList.add('hidden');
            });
        }
    });

    document.querySelectorAll('.toggle-switch input').forEach(function (input) {
        input.addEventListener('change', function () {
            var label = this.closest('.toggle-switch');
            if (label) {
                label.classList.toggle('on', this.checked);
                label.classList.toggle('off', !this.checked);
            }
        });
    });

    document.querySelectorAll('.subnav-toggle').forEach(function (toggle) {
        toggle.addEventListener('click', function (e) {
            e.preventDefault();
            var target = document.getElementById(this.dataset.target);
            if (target) {
                target.classList.toggle('hidden');
            }
        });
    });
});
