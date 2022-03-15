@php
$judul = app()->view->getSections()['prefix'];
@endphp
<x-menu :judul="$judul" text="Dashboard" url="home" icon="home" />
{{-- <x-menu :judul="$judul" text="Cetak" url="cetak" icon="print" /> --}}
@hasrole('admin')
    <x-menu :judul="$judul" text="Santri" url="students.index" icon="users" />
@endhasrole
