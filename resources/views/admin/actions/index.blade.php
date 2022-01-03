@extends('layouts.admin')

@section('content')
<h1>Акции</h1>

<a class="btn btn-info" href="/admin/actions/create">Создать акцию</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>№</th>
            <th>Дата окончания</th>
            <th>Заголовок</th>
            <th>Текст анонса</th>
            <th>Изображение</th>
            <th class="text-right col-md-2"></th>
        </tr>
    </thead>
    <tbody class="sortable" data-entityname="action">
        @foreach ($actions as $action)
        <tr data-itemId="{{ $action->id }}" data-sort="{{ $action->sort }}">
            <td>{{ $action->id }}</td>
            <td>{{ $action->date->format('d.m.Y') }}</td>
            <td>{{ $action->title }}</td>
            <td>{{ str_limit($action->text, 50) }}</td>
            <td><img width="100" src="{{ \App\Models\Action::images_path.$action->image }}" alt=""></td>
            <td class="text-right col-md-2">
                <div class="sortable-handle btn btn-info" title="Тащите для сортировки">
                    <span class="glyphicon glyphicon-sort"></span>
                </div>
                <a class="btn btn-info" href="/admin/actions/edit/{{ $action->id }}" title="Редактировать">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <form class="inline-block" method="POST" action="/admin/actions/destroy/{{ $action->id }}">
                    {!! csrf_field() !!}
                    <button class="btn btn-danger" title="Удалить" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
