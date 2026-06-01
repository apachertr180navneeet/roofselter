import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('admin-sidebar');
    const toggleBtn = document.getElementById('sidebar-toggle');

    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', function () {
            sidebar.classList.toggle('collapsed');
        });
    }

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
