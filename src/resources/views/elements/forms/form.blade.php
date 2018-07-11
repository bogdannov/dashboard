<form class="{{$classes}} @if($horizontal) form-horizontal @endif" role="form" action="{{$action}}" method="{{$method}}">
    {{ csrf_field() }}
    {{ method_field($method) }}
    @section('form_content')
        {!! $form_content !!}
    @show
</form>