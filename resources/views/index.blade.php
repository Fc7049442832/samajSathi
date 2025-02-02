@extends('layouts.app')
@section('content')
    <x-carousel :images="$data" />
    <x-search-partner />
    <x-show-partner :users="$combinedUsers" />
    <x-registration-step />
    <x-QuestionsBox />
    <x-FeedbackForm :images="$feedback" />

@endsection

