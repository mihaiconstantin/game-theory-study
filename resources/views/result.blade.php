@extends('templates.main')

{{--score canvas?--}}
@section('score')
    @include('partials._score')
@endsection


{{--main canvas--}}
@section('content')
    @include('partials._result')
@endsection