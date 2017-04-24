@extends('templates.main')

{{--no score canvas--}}


{{--main canvas--}}
@section('content')
    {{--self-report will be injectected into "_instruction"--}}
    @include('partials._feedback')
@endsection