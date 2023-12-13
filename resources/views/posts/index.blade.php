<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <x-slot name='header'>
            Index
        </x-slot>
    <body>
        <h1>投稿一覧</h1>
        <a href='/posts/create'>create</a>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href='/posts/{{ $post->id }}'>{{ $post->title }}</a>
                    </h2>
                    <small>{{ $post->user->name }}</small>
                    <image src='{{ $post->image_url }}' alt='画像が読み込めません。'/>
                    <p class='body'>{{ $post->body }}</p>
                    <form action='/posts/{{ $post->id }}' id='form_{{ $post->id }}' method='post'>
                        @csrf
                        @method('DELETE')
                        <button type='button' onclick='deletePost({{ $post->id }})'>delete</button>
                    </form>
                </div>
                <a href=''>{{ $post->amount->name }}</a>
                <a href=''>{{ $post->type->name }}</a>
                <a href=''>{{ $post->method->name }}</a>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <script>
        function deletePost(id){
            'use strict'
            
            if (confirm('削除すると復元できません。\n本当に削除しますか？')){
                document.getElementById(`form_${id}`).submit();
            }
        }
        </script>
    </x-app-layout>
    </body>
</html>

