<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <x-slot name='header'>
            自分の投稿一覧
        </x-slot>
    <body>
        <div class='own_posts'>
            @foreach ($own_posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href='/posts/{{ $post->id }}'>{{ $post->title }}</a>
                    </h2>
                    <small>{{ $post->user->name }}</small>
                    <image src='{{ $post->image_url }}' alt='画像が読み込めません。'/>
                    <p class='body'>{{ $post->body }}</p>
                </div>
                <a href=''>{{ $post->amount->name }}</a>
                <a href=''>{{ $post->type->name }}</a>
                <a href=''>{{ $post->method->name }}</a>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $own_posts->links() }}
        </div>
    </x-app-layout>
    </body>
</html>