@extends('layouts.master')

@section('head')
    <link href='/css/card.css' rel='stylesheet'>
@endsection

@section('title')
    Vectography : {{-- TODO: Noscript? --}} {{ $graphic->title }}
@endsection

@section('content')
@include('card', array('graphic'=>$graphic,'cardSize'=>'full'))
@stop