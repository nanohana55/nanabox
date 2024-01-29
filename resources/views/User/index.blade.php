<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <x-slot name='header'>
            自分の投稿一覧
        </x-slot>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    
    <body>
        <div class='own_posts'>
            @foreach ($own_posts as $post)
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
            {{ $own_posts->links() }}
        </div>
        <div class='footer'>
            <a href='/'>戻る</a>
        </div>
    </x-app-layout>
    </body>
</html>