name="{{$element->attr_name}}"
id="{{$element->attr_id}}"
class="{{$element->attr_class}}"

@if($element->attr_type) type="{{$element->attr_type}}" @endif
@if($element->attr_placeholder) placeholder="{{$element->attr_placeholder}}" @endif

autocomplete="{{$element->attr_autocomplete ? 'on' : 'off'}}"
{{$element->attr_required ? 'required' : null}}
{{$element->attr_disabled ? 'disabled' : null}}