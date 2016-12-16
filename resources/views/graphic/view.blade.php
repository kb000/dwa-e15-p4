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
          @include('card', array('graphic'=>$graphic))
    </div>
</div>
@stop