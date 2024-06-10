@props([
    'type' => 'text','name','value' => ''
])
<input
    type="{{$type}}"
    name="{{$name}}"
    value="{{old($name,$value)}}"
    {{$attributes->class([
        'form-control',
        'is-invalid' => $errors->has($name)
    ])}}
>

<x-form.validation-feedback :name="$name" />
