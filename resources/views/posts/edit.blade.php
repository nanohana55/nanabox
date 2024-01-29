<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <x-slot name='header'>
            編集画面
        </x-slot>
    <body>
        <div class='content'>
            <form action='/posts/{{ $post->id }}' method='POST'>
                @csrf
                @method('PUT')
                <div class='content_title'>
                    <h2>Title</h2>
                    <input type='text' name='post[title]' value='{{ $post->title }}'>
                </div>
                <div class='content_body'>
                    <h2>本文</h2>
                    <input type='text' name='post[body]' value='{{ $post->body }}'>
                </div>
                <input type='submit' value='store'>
            </form>
        </div>
        <div class='footer'>
            <a href='/'>戻る</a>
        </div>
    </x-app-layout>
    </body>
</html>