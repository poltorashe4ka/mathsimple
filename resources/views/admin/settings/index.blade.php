@extends('layouts.admin')

@section('content')
<h1>Настройки</h1>

<a class="btn btn-info" href="/admin/settings/create">Создать настройку</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>№</th>
            <th>Создана</th>
            <th>Имя</th>
            <th>Значение</th>
            <th class="text-right col-md-2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($settings as $setting)
        <tr>
            <td>{{ $setting->id }}</td>
            <td>{{ $setting->created_at->format('d.m.Y H:i:s') }}</td>
            <td>{{ $setting->name }}</td>
            <td>{{ $setting->value }}</td>
            <td class="text-right col-md-2">
                <a class="btn btn-info" href="/admin/settings/edit/{{ $setting->id }}" title="Редактировать">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <form class="inline-block" method="POST" action="/admin/settings/destroy/{{ $setting->id }}">
                    {!! csrf_field() !!}
                    <button class="btn btn-danger" title="Удалить" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
