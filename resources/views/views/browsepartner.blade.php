@extends('layouts.app')

@section('title', 'Samaj Sathi Matrimony | Perfect Life Partner | Tech Sathi')

@section('meta')
<meta name="description" content="Samaj Sathi Matrimony by Tech Sathi is your trusted platform to find verified profiles, chat securely, and meet your perfect life partner. Join now!">
<meta name="keywords" content="Samaj Sathi, Tech Sathi, Matrimony Site, Marriage, Life Partner, Matchmaking, Best Matrimonial Platform, Indian Matrimony">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('content')

<div class="color-section"></div>

<div class="content main-container">
    <!-- Partner Box Section -->
    <div class="partner_box">
        <div class="card">
            <x-PartnerCard :users="$combinedUsers" />
        </div>

        <!-- Back Button -->
        <div class="row justify-content-center mt-4">
            <button class="col-6 col-md-2 btn btn-danger" onclick="goBack()">Back</button>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    /* Background Color Section */
    .color-section {
        width: 100%;
        height: 35vh;
        background-color: #eeb843;
        position: fixed;
        top: 0;
        left: 0;
        z-index: -1;
    }

    /* Main Content Area */
    .content {
        position: relative;
        padding-top: 40vh;
    }

    /* Partner Box Styling */
    .partner_box {
        height: 78vh;
        width: 100%;
        overflow-y: auto;
        padding: 20px;
    }

    .partner_box::-webkit-scrollbar {
        display: none;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .partner_box {
            height: auto;
            padding-bottom: 100px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
function goBack() {
    window.history.back();
}
</script>
@endpush