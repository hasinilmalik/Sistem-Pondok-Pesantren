@php
// judul ini yang di tangkap dari view content
$judul = app()->view->getSections()['prefix'];
@endphp
<x-menu :href="route('home')" :icon="'fas fa-home'" :text="'Home'" :active="request()->is('home')" />
@hasrole('admin')
    <x-menu :href="route('students.index')" :icon="'fas fa-tachometer-alt'" :text="'Santri'" :active="request()->is('students')" />
    <x-menu :href="route('pay.list', 'offline')" :icon="'fas fa-list'" :text="'Pembayaran'" :active="request()->is('transaction/list/offline')" />
@endhasrole
@hasrole('guest')
    <x-menu :href="route('guest.show')" :icon="'fas fa-list'" :text="'Data santri'" :active="request()->is('students')" />
    <x-menu :href="route('guest.bills')" :icon="'fas fa-dollar-sign'" :text="'Daftar tagihan'" :active="request()->is('students')" />
@endhasrole
