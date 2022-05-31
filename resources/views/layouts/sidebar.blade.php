@php

// Request::url(), or Request::fullUrl(), or Request::path(), Request::is() and also Request::segment().
// judul ini yang di tangkap dari view content
$judul = app()->view->getSections()['prefix'];
@endphp
<x-menu :href="route('home')" :icon="'fas fa-home'" :text="'Home'" :active="request()->is('home')" />
@hasrole('admin')
    <x-menu :href="route('students.index')" :icon="'fas fa-user'" :text="'Santri'" :active="Request::segment(1) == 'students' || Request::segment(1) == 'student'" />
    <x-menu :href="route('pay.list', 'offline')" :icon="'fas fa-list'" :text="'Pembayaran'" :active="request()->is('transaction/list/offline')" />
    <x-menu :href="route('users.index')" :icon="'fas fa-user'" :text="'Users'" :active="Request::segment(1) == 'users' || Request::segment(1) == 'user'" />
@endhasrole
@hasrole('guest')
    <x-menu :href="route('guest.show')" :icon="'fas fa-list'" :text="'Data santri'" :active="request()->is('guest/show')" />
    <x-menu :href="route('guest.bills')" :icon="'fas fa-dollar-sign'" :text="'Daftar tagihan'" :active="request()->is('students')" />
@endhasrole
