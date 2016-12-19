@extends('layouts.master')

@section('head')
    <link href='/css/card.css' rel='stylesheet'>
@endsection

@section('title')
    Vectography
@endsection

@section('content')
    @foreach($graphics as $graphic)
        @include('card', array('graphic'=>$graphic,'cardSize'=>'big thumbnail'))
    @endforeach
@stop

@section('footer')
    <div class="footer-wrapper">
    @if(Auth::check())
        <form action="/logout" method="post">
            {{ csrf_field() }}
            <submit type="submit" class="btn btn-default">log out</button>
        @else
        <form class="form-inline" action="/login" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="sr-only" for="email">Username (email) </label>
                <input type="email" class="form-control" name="email" id="email" placeholder="user@example.com">
            </div>
            <div class="form-group">
                <label class="sr-only" for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="password">
            </div>
            <button type="submit" class="btn btn-default" onclick="form.submit()">log in</button>
        @endif
        </form>
    </div>
@stop