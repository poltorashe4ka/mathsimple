@extends('layouts.admin')

@section('content')
<h1>Тесты</h1>

<a class="btn btn-info" href="/admin/tests/create">Создать тест</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>№ теста</th>
            <th>Вопрос</th>
            <th class="text-right col-md-2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tests as $test)
        <tr>
            <td>{{ $test->test_id }}</td>
            <td>{{ $test->questions }}</td>
            <td class="text-right col-md-2">
                <a class="btn btn-info" href="/admin/tests/edit/{{ $test->id }}" title="Редактировать">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <form class="inline-block" method="POST" action="/admin/tests/destroy/{{ $test->id }}">
                    {!! csrf_field() !!}
                    <button class="btn btn-danger" title="Удалить" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{--{{$test->links()}}--}}

@endsection
