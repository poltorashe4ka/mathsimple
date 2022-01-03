@extends('layouts.admin')

@section('content')

<a class="btn btn-info" href="/admin/leads">Назад</a>

<h3>Данные заявителя</h3>

<p><b>ФИО:</b> {{ $lead->name }}</p>
<h3>Техническая информация</h3>

<p><b>Номер заявки:</b> {{ $lead->id }}</p>
<p><b>Дата:</b> @if($lead->created_at){{ $lead->created_at->format('d.m.Y H:i:s') }}@endif</p>
<p><b>Реферер:</b> {{ $lead->referer }}</p>
<p><b>IP адрес:</b> {{ $lead->ip_address }}</p>
<p><b>AirBridge ID:</b> {{ $lead->ab_id }}</p>
<p><b>Комментарий источника для CRM:</b> {{ $lead->comment }}</p>

@if($lead->additional_params && !empty(unserialize($lead->additional_params)))
    <h3>Метки</h3>
    @foreach(unserialize($lead->additional_params) as $key=>$value)
        <p><b>{{ $key }}:</b> {{ $value }}</p>
    @endforeach
@endif

@endsection
