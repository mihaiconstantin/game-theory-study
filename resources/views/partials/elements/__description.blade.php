<div class="condition-title title">{{$data->title}}@if(isset($gameNumber)) &ndash; Game {{$gameNumber}}@endif</div>

@include('partials.elements.__flash')

<div id="instruction-box-message" class="condition-description">{!!$data->text !!}</div>

