import './bootstrap';
import '../../vendor/masmerise/livewire-toaster/resources/js'; // 👈
import '../../vendor/rappasoft/laravel-livewire-tables/resources/imports/laravel-livewire-tables-all.js';
import '../../vendor/rappasoft/laravel-livewire-tables/resources/imports/laravel-livewire-tables.js';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
