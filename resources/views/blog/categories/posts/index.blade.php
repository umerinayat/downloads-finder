@extends('layouts.master')

@section('page-title') {{$category->name}} @endsection

@section('main-content') 
    {{$category->name}} 
@endsection
