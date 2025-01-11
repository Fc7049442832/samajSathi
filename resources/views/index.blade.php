@extends('layouts.app')
@section('content')

    <x-carousel />
    <x-searchPartner  />  
    <x-show-partner :users="$combinedUsers" />

    
    <x-registration-step />
   
    <x-QuestionsBox />

    
@endsection

