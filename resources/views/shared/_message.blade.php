@foreach(['danger','waring','success','info'] as $msg)
    @if(session()->has($msg))
        <div class="flash-message">
            <div class="alert alert-{{$msg}}">
                {{session()->get($msg)}}
            </div>
        </div>
    @endif
@endforeach