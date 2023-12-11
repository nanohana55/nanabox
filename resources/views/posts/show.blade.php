<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>グッズ収納お助けHEROES</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    
    </head>
    <body>
        <h1 class='title'>
            {{ $post->title }}
        </h1>
        <small>{{ $post->user->name }}</small>
        <div class='content'>
            <div class='content_photo'>
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
        <div class='footer'>
            <a href='/'>戻る</a>
        </div>
    </body>
</html>
