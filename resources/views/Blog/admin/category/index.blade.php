@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                //Проверь классы тут, если верстка будет мудить
                <nav class="navbar navbar-togleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('blog.admin.categories.create') }}">Добавить</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Категория</th>
                                <th>Родитель</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $item)
                                @php
                                    /** @var \App\Models\BlogCategory $item */
                                @endphp
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <a href="{{ route('blog.admin.categories.edit', $item->id) }}">
                                            {{ $item->title }}
                                        </a>
                                    </td>
                                    //Проверь классы тут, если верстка будет мудить
                                    <td @if(in_array($item->parent_id, [0,1])) style="align-content: center" @endif>
                                    {{ $item->parent_id }}{{-- $item->parentCategory->title --}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>