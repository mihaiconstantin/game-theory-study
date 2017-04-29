@foreach ($elements as $element)
    <div class="form-group">
        <label for="{{$element->attr_id}}">{{$element->label}}</label>

        @if($element->tag_type == 'select')

            <select @include('macros._attributes')>
                <option selected disabled hidden value="">choose an option</option>
                @foreach($element->select_options as $option)
                    <option value="{{$option->value}}">{{$option->text}}</option>
                @endforeach
            </select>

        @elseif($element->tag_type == 'textarea')

            <textarea @include('macros._attributes') maxlength="350">{{$element->attr_value ?? null}}</textarea>

        @else

            <input @include('macros._attributes') value="{{$element->attr_value ?? null}}">

        @endif
    </div>
@endforeach