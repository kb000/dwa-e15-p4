@extends('layouts.master')

@section('head')
    <link href='/css/card.css' rel='stylesheet'>
@endsection

@section('title')
    Vectography : {{-- TODO: Noscript? --}} {{ $graphic->title }}
@endsection

@section('content')
<div class='content-sheets'>
    <div class='user-sheet-container'>
        <h2>Generated User:</h2>
            @include('user.show', array('myUser'=>$generatedUser))
            @include('layouts.generation.form', array('entity'=>'user'))
    </div>
    <div class='ipsum-sheet-container'>
        <h2>Generated Lorem Ipsum:</h2>
            @include('ipsum.show', array('myIpsum'=>$generatedIpsum))
            @include('layouts.generation.form', array('entity'=>'ipsum'))
    </div>
</div>
@stop