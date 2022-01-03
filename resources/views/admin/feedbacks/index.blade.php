@extends('layouts.admin')

@section('content')
<h1>Отзывы</h1>

<a class="btn btn-info" href="/admin/feedbacks/create">Создать отзыв</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>№</th>
            <th>Активен</th>
            <th>Автор</th>
            <th>Дата</th>
            <th>Текст</th>
            <th class="text-right col-md-2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($feedbacks as $feedback)
        <tr>
            <td>{{ $feedback->id }}</td>
            <td>
                @if($feedback->active)
                    <span class="text-success glyphicon glyphicon-ok"></span>
                @else
                    <span class="text-danger glyphicon glyphicon-remove"></span>
                @endif
            </td>
            <td>{{ $feedback->author }}</td>
            <td>{{ $feedback->date->format('d.m.Y') }}</td>
            <td>{{ \Illuminate\Support\Str::limit($feedback->text, 50) }}</td>
            <td class="text-right col-md-2">
                <a class="btn btn-info" href="/admin/feedbacks/edit/{{ $feedback->id }}" title="Редактировать">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <form class="inline-block" method="POST" action="/admin/feedbacks/destroy/{{ $feedback->id }}">
                    {!! csrf_field() !!}
                    <button class="btn btn-danger" title="Удалить" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{$feedbacks->links()}}

@endsection
