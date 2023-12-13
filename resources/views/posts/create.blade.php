<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <x-slot name='header'>
            Create
        </x-slot>
    <body>
        <h1>新規投稿</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class='title'>
                <h2>Title</h2>
                <input type='text' name='post[title]' placeholder='タイトル'/>
            </div>
            <div class='image'>
                <input type="file" name='image'>    
            </div>
            <div class='body'>
                <h2>Body</h2>
                <textarea name='post[body]' placeholder='本文'></textarea>
            </div>
            <div class='amount'>
                <h2>Amount</h2>
                <select name='post[amount_id]'>
                    @foreach($amounts as $amount)
                        <option value='{{ $amount->id }}'>{{ $amount->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class='type'>
                <h2>Type</h2>
                <select name='post[type_id]'>
                    @foreach($types as $type)
                    <option value='{{ $type->id }}'>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class='method'>
                <h2>Method</h2>
                <select name='post[method_id]'>
                    @foreach($methods as $method)
                    <option value='{{ $method->id }}'>{{ $method->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type='submit' value='store'/>
        </form>
        <div class='footer'>
            <a href='/'>戻る</a>
        </div>
    </x-app-layout>
    </body>
</html>
