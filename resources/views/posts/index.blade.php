<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>グッズ収納お助けHEROES</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
    </head>
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
                </div>
                <a href=''>{{ $post->amount->name }}</a>
                <a href=''>{{ $post->type->name }}</a>
                <a href=''>{{ $post->method->name }}</a>
            @endforeach
       </div>
       <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>

