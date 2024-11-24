@extends('layouts.main')

@section('content')
    {{-- navbar --}}
    <x-layouts.navbar :user="Auth::user()" route="dashboard.index" ></x-layouts.navbar>

   
@endsection
