@extends('layouts.admin')

@section('content')
<h1>SEO настройки для страниц</h1>

<a class="btn btn-info" href="/admin/seos/create">Создать SEO-теги для страницы</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>URL</th>
            <th>Title</th>
            <th>Keywords</th>
            <th>Description</th>
            <th>h1</th>
            <th>Текст</th>
            <th class="text-right col-md-2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($seos as $seo)
        <tr>
            <td>{{ $seo->url }}</td>
            <td>
                @if(!empty($seo->title))
                    <span class="text-success glyphicon glyphicon-ok"></span>
                @else
                    <span class="text-danger glyphicon glyphicon-remove"></span>
                @endif
            </td>
            <td>
                @if(!empty($seo->keywords))
                    <span class="text-success glyphicon glyphicon-ok"></span>
                @else
                    <span class="text-danger glyphicon glyphicon-remove"></span>
                @endif
            </td>
            <td>
                @if(!empty($seo->description))
                    <span class="text-success glyphicon glyphicon-ok"></span>
                @else
                    <span class="text-danger glyphicon glyphicon-remove"></span>
                @endif
            </td>
            <td>
                @if(!empty($seo->h1))
                    <span class="text-success glyphicon glyphicon-ok"></span>
                @else
                    <span class="text-danger glyphicon glyphicon-remove"></span>
                @endif
            </td>
            <td>
                @if(!empty($seo->text))
                    <span class="text-success glyphicon glyphicon-ok"></span>
                @else
                    <span class="text-danger glyphicon glyphicon-remove"></span>
                @endif
            </td>
            <td class="text-right col-md-2">
                <a class="btn btn-info" href="/admin/seos/edit/{{ $seo->id }}" title="Редактировать">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <form class="inline-block" method="POST" action="/admin/seos/destroy/{{ $seo->id }}">
                    {!! csrf_field() !!}
                    <button class="btn btn-danger" title="Удалить" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
