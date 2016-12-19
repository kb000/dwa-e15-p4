@extends('layouts.master')

@section('head')
    <link href='/css/card.css' rel='stylesheet'>
@endsection

@section('title')
    Vectography : Edit
@endsection

@section('content')
<form action="/graphics" method="post" class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>New Vector Graphic</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="title">Title</label>  
            <div class="col-md-4">
                <input name="title" class="form-control input-md" 
                id="title" required="" type="text" placeholder=""
                value="{{ old('title', session('title', '')) }}">
                <span class="help-block">The title for your graphic</span>  
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="description">Description</label>
            <div class="col-md-4">                     
                <textarea name="description" class="form-control" 
                id="description">{{ old('description', session('description', '')) }}</textarea>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="svgText">SVG</label>  
            <div class="col-md-4">
                <input name="svgText" class="form-control input-md" 
                id="svgText" type="text" placeholder='<svg width="10" height="10"> <!-- svg content --> </svg>'
                 value="{{ old('svgText', session('svgText', '')) }}">
            </div>
        </div>

        {{ csrf_field() }}

        @if(isset($graphic_id))
            <input name="graphic_id" type="hidden" value="{{ $graphic_id }}"></input>
        @endif
    </fieldset>
    <button type="submit" class="btn btn-default">Submit</button>
</form>         
@stop