@extends('layouts.admin')

@section('content')
<h1>Жалобы</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>№</th>
            <th>Создан</th>
            <th>ФИО</th>
            <th>Телефон</th>
            <th>Email</th>
            <th>Сообщение</th>
            <th class="text-right col-md-1"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($complains as $complain)
        <tr>
            <td>{{ $complain->id }}</td>
            <td>{{ $complain->created_at->format('d.m.Y H:i:s') }}</td>
            <td>{{ $complain->fio }}</td>
            <td>{{ $complain->mobile_tel }}</td>
            <td>{{ $complain->email }}</td>
            <td>{{ str_limit($complain->message, 200, '...') }}</td>
            <td class="text-right col-md-1">
                <a class="btn btn-info" href="/admin/complains/show/{{ $complain->id }}" title="Показать">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
Всего: {{ $complains->total() }} <br>
{!! $complains->links() !!}
@endsection
