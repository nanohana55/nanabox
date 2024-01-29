<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <x-slot name='header'>
            {{ $post->title }}
        </x-slot>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    
    <body>
        <small>{{ $post->user->name }}</small>
        <div class='content'>
            <div class='content_image'>
                <img src='{{ $post->image_url }}' alt='画像が読み込めません。'/>
            </div>
            <div class='content_post'>
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
            <a href=''>{{ $post->amount->name }}</a>
            <a href=''>{{ $post->type->name }}</a>
            <a href=''>{{ $post->method->name }}</a>
        </div>
        <div class='edit'>
            <a href='/posts/{{ $post->id }}/edit'>Edit</a>
        </div>
        <div class='footer'>
            <a href='/'>戻る</a>
        </div>
    </x-app-layout>
    </body>
</html>
