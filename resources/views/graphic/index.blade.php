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