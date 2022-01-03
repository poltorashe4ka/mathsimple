@extends('layouts.admin')

@section('content')

<a class="btn btn-info" href="/admin/complains">Назад</a>

<h3>Данные жалобы</h3>

<p><b>Создан:</b> {{ $complain->created_at->format('d.m.Y H:i:s') }}</p>
<p><b>ФИО:</b> {{ $complain->fio }}</p>
<p><b>Мобильный телефон:</b> {{ $complain->mobile_tel }}</p>
<p><b>Email:</b> {{ $complain->email }}</p>
<p><b>Сообщение:</b> {{ $complain->message }}</p>



@endsection
