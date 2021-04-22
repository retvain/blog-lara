@extends('layouts.app')

@section('content')
    <div class="container">
    {{--    @if(session(('success')))
            <div class="row justify-content-center">
                <div class="col-md-12">
                </div>
            </div>
    @endif--}}
    <div class="row justify-content-center">
    <nav class="col-md-12">
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded"
        <a class="btn btn-primary" href="{{ route('blog.admin.posts.create') }}">Написать</a>
    </nav>
    <div class="card">
    <div class="card-body">
    <table class="table table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Автор</th>
        <th>Категория</th>
        <th>Заголовок</th>
        <th>Дата публикации</th>
    </tr>
    </thead>
    <tbody>
    @foreach($paginator as $post)
    @php
        /** @var \App\Models\BlogPost $post */
    @endphp
    <tbody @if(!$spot->is_published) style="background-color: #ccc;" @endif>
        <td>{{ $post->id }}</td>
        <td>{{ $post->user_id }}</td>
        <td>{{ $post->category_id }}</td>
        <td>
            <a href="{{ route('blog.admin.posts.edit', $post->id) }}">{{ $post->title }}</a>
        </td>
    @endforeach
    </tbody>
            <tfoot></tfoot>



@endsection
