@extends('layouts.admin')

@section('content')
<h1>Б/У Марки</h1>

@if($import_running)
<div class="text-success">В данный момент идет синхронизация</div>
@else
<a class="btn btn-info" href="/admin/used_brands/sync">Синхронизировать внеурочно</a>
@endif
<table class="table table-striped">
    <thead>
        <tr>
            <th>№</th>
            <th>Название</th>
            <th>Алиас</th>
            <th>Изображение</th>
            <th class="text-right col-md-2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($brands as $brand)
        <tr>
            <td>{{ $brand->id }}</td>
            <td>{{ $brand->name }}</td>
            <td>{{ $brand->alias }}</td>
            <td>
                @if($brand->image)
                    <img src="{!! \App\Models\UsedBrand::images_path.$brand->image !!}" alt="">
                @else
                    Изображение не загружено
                @endif
            </td>
            <td class="text-right col-md-2">
                <a class="btn btn-info" href="/admin/used_brands/edit/{{ $brand->id }}" title="Редактировать">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection