<div class="text-right">
    {{--if the route has parameters, they will be appended to the URL, otherwise they will be ignored, because we pass an empty array of paramaters by default--}}
    <a href="{{URL::route($instruction->next_url, $instruction->url_parameters)}}" class="btn btn-primary mt-1" id="@yield('continue-btn-id')">Continue &raquo</a>
</div>