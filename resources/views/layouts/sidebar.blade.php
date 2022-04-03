@php
// judul ini yang di tangkap dari view content
$judul = app()->view->getSections()['prefix'];
@endphp
<x-menu :judul="$judul" text="Dashboard" url="home" icon="home" />
{{-- <x-menu :judul="$judul" text="Cetak" url="cetak" icon="print" /> --}}
@hasrole('admin')
    <x-menu :judul="$judul" text="Santri" url="students.index" icon="users" />
@endhasrole
@hasrole('guest')
    <x-menu :judul="$judul" text="Data Santri" url="guest.show" icon="list" />
    <x-menu :judul="$judul" text="Daftar Tagihan" url="guest.bills" icon="list" />
@endhasrole
