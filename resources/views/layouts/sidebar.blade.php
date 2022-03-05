@php
$judul = app()->view->getSections()['judul'];
@endphp
<x-menu :judul="$judul" text="Dashboard" url="home" icon="home" />
{{-- <x-menu :judul="$judul" text="Cetak" url="cetak" icon="print" /> --}}
<x-menu :judul="$judul" text="Santri" url="students.index" icon="users" />
