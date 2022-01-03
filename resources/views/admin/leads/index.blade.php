@extends('layouts.admin')

@section('content')
<h1>Пользователи</h1>

<form method="GET" action="/admin/leads">
    <div class="col-sm-2">
        <div class="form-group">
            <label for="name">Фамилия</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ Request::input('name') }}">
        </div>
    </div>
    <div class="col-sm-2">
        <label>&nbsp;</label>
        <button type="submit" class="form-control btn btn-info">
            Показать
        </button>
    </div>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>№</th>
            <th>Дата регистрации</th>
            <th>Подписка</th>
            <th>ФИО</th>
            <th>Почта</th>
            <th class="text-right col-md-1"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($leads as $lead)
        <tr>
            <td>{{ $lead->id }}</td>
            <td>@if($lead->created_at){{ $lead->created_at->format('d.m.Y H:i:s') }}@endif</td>
            <td>@if($lead->pay_to){{ $lead->pay_to }}@endif</td>
            <td>{{ $lead->name }}</td>
            <td>{{ $lead->email }}</td>
            <td class="text-right col-md-1">
                <a class="btn btn-info" href="/admin/leads/show/{{ $lead->id }}" title="Показать">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
Всего: {{ $leads->total() }} <br>
{!! $leads->links() !!}
@endsection
