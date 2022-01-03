@extends('layouts.admin')

@section('content')
<h1>Баннеры главной страницы</h1>

<a class="btn btn-info" href="/admin/main_page_banners/create">Добавить баннер</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>№</th>
            <th>Изображение</th>
            <th>Метка</th>
            <th>Значение метки</th>
            <th>Сслыка</th>
            <th class="text-right col-md-2"></th>
        </tr>
    </thead>
    <tbody class="sortable" data-entityname="main_page_banner">
        @foreach ($banners as $banner)
        <tr data-itemId="{{ $banner->id }}">
            <td>{{ $banner->id }}</td>
            <td>
                <img src="{{ \App\Models\MainPageBanner::images_path.$banner->image }}" width="400" alt="">
            </td>
            <td>{{ $banner->parameter }}</td>
            <td>{{ $banner->marker }}</td>
            <td>{{ $banner->link }}</td>
            <td class="text-right col-md-2">
                <div class="sortable-handle btn btn-info" title="Тащите для сортировки">
                    <span class="glyphicon glyphicon-sort"></span>
                </div>
                <form class="inline-block" method="POST" action="/admin/main_page_banners/destroy/{{ $banner->id }}">
                    {!! csrf_field() !!}
                    <button class="btn btn-danger" title="Удалить" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
