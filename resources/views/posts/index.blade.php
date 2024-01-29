<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <x-slot name='header'>
            投稿一覧
        </x-slot>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    
    <body>
        <a href='/user'>my post</a>
        <br>
        <a href='/posts/create'>create</a>
            @foreach ($posts as $post)
                <div class='post'>
                    <small>{{ $post->user->name }}</small>
                    <div class='post_image'>
                        <image src='{{ $post->image_url }}' alt='画像が読み込めません。'/>
                    </div>
                    <h2 class='post_title'>
                        <a href='/posts/{{ $post->id }}'>{{ $post->title }}</a>
                    </h2>
                    <form action='/posts/{{ $post->id }}' id='form_{{ $post->id }}' method='post'>
                        @csrf
                        @method('DELETE')
                        <button type='button' onclick='deletePost({{ $post->id }})'>delete</button>
                    </form>
                </div>
                <div class='post_category'>
                    <a href=''>{{ $post->amount->name }}</a>
                    <a href=''>{{ $post->type->name }}</a>
                    <a href=''>{{ $post->method->name }}</a>
                </div>
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

