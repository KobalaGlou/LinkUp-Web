import './bootstrap';
import $ from 'jquery';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function() {
    $('.js-example-placeholder-single').select2({
        placeholder: "Select a state",
        allowClear: true
    });
});

document.addEventListener('DOMContentLoaded', function () {
    Alpine.data('modalManager', () => ({
        showModal(modalName) {
            this.$dispatch('open-modal', { name: modalName });
        }
    }));
});
