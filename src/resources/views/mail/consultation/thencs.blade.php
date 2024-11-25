@extends('layouts.all')

@php
    $title = "Благодарим за обращении";
    $description = "Благодарим за обращении, ждите обратной связи от наших специалистов";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')
<section class="thencs_section">
    <div class="container">
        <h1> Благодарим за обращение</h1>
        <p>Мы свяжемся с Вами в ближайшее время</p>
        <p class="emoji">💖</p>
    </div>
</section>
@endsection
