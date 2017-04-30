@extends('templates.main')

{{--score canvas?--}}
@section('score')
    {{--@include('partials._score')--}}
@endsection


{{--main canvas--}}
@section('content')
    @include('partials._choice')
@endsection



{{--TODO: turn the div with the choice into a form--}}
