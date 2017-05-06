<div class="text-right">

    {{--
        If the route has parameters, they will be appended to the route name,
        otherwise they will be ignored, because we pass an empty array of
        paramaters by default.
    --}}

    <a href="{{URL::route($data['next_url'], $data['parameters'])}}" class="btn btn-primary mt-1" id="@yield('continue-btn-id')">
        Continue &raquo;
    </a>

</div>