@extends('layouts.app')
@section('content')

    {{-- call to matching Card --}}
    <x-MatchCard :partner="$data" :user="$user" />

    
@endsection