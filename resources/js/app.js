import './bootstrap';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.css';
import Swal from 'sweetalert2';

// Initialize date pickers
document.addEventListener('DOMContentLoaded', function() {
    const dateInputs = document.querySelectorAll('input[type="datetime-local"]');
    dateInputs.forEach(input => {
        flatpickr(input, {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true,
            locale: "lt"
        });
    });
});

// Initialize delete confirmations
document.addEventListener('DOMContentLoaded', function() {
    const deleteForms = document.querySelectorAll('form[data-confirm]');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: this.dataset.confirm,
                text: "Šio veiksmo atšaukti negalima!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Taip, ištrinti!',
                cancelButtonText: 'Atšaukti'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
});
