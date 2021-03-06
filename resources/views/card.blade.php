{{--
    Graphic card view.
    @param $graphic Kb0\Vectography\Graphic model object.
    @param $cardSize 'full'|'big'|'medium'|'small'
--}}

{{-- 
Copyright (c) 2015 - Mattia Astorino - http://codepen.io/MattiaAstorino/pen/VYWxXy

Permission is hereby granted, free of charge, to any person 
obtaining a copy of this software and associated documentation 
files (the "Software"), to deal in the Software without restriction,
 including without limitation the rights to use, copy, modify, 
merge, publish, distribute, sublicense, and/or sell copies of 
the Software, and to permit persons to whom the Software is 
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall 
be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, 
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES 
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND 
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT 
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, 
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, 
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER 
DEALINGS IN THE SOFTWARE. 
--}}

<!-- Card -->
<div class="card card--{{ $cardSize }}">
  <div class="card__content content">
    <div class="card__image" style="background-image: url({{ $graphic->GetThumbnailDataUri() }})"></div>
    <h2 class="card__title"><a href="{{ '/graphics/'. $graphic->id }}"/>{{ $graphic->title }}</a></h2>
    <span class="card__subtitle">{{ $graphic->subtitle }}</span>
    <p class="card__text">{{ $graphic->description }}</p>
    <input class="graphic-id" type="hidden" value="{{ $graphic->id }}" />
  </div>
  <div class="card__action-bar">
    @if(Ownership::isOwned($graphic))
    <a href="{{ '/graphics/edit/' . $graphic->id }}"><button title="Edit info or make a new version." class="card__button">EDIT</button></a>
    @else
    <a href="{{ '/graphics/edit/0?dup=' . $graphic->id }}"><button title="Edit a copy" class="card__button">FORK</button></a>
    @if(Auth::check())
    <a href="{{ '/graphics/chown/' . $graphic->id }}"><button title="Acquire ownership" class="card__button">CHOWN</button></a>
    @endif
    @endif
    <a href="{{ '/g/' . $graphic->id . '.svg'}}"><button title="Download" class="card__button">DOWNLOAD</button></a>
    @if(Ownership::isOwned($graphic) && (strpos($cardSize, 'thumbnail') == false))
      <form action="{{ '/graphics/' . $graphic->id }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="hidden" name="graphic_id" id="graphic_id" value="{{ $graphic->id }}"></input>
        <button title="Delete" class="card__button" onclick="form.submit()">DELETE</button>
      </form>
    @endif
  </div>
</div>