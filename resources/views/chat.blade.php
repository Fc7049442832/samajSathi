@extends('layouts.app')
@section('content')

{{-- Chat Box Container --}}
<div class="chat-container">
    {{-- Chat Box Header --}}
    <div class="row">
        <div class="row" style="  border: 1px solid #ccc; border-radius: 8px;">
            {{-- Back Button --}}
            <div class="col-1 pt-2 ">
                <button onclick="goBack()" class="bg-danger text-center" style="margin: auto 1px;"> <strong class=""> < </strong></button>
            </div>
            {{-- user image --}}
            <div class="header-image-chat-box col-2 text-center">
                <img src="{{asset($user->profile->profile_image ? 'storage/' . $user->profile->profile_image : 'images/set_partner_per.jpg')}}" alt=""  >
            </div>
            {{-- user name --}}
            <div class="col-8 header-name-chat-box pt-2">
                <h5>{{$user->name}}</h5> 
            </div>
            {{-- chat box menu  --}}
            <div class="col-1 pt-2">
                    <div class="btn-group dropstart">
                    <button type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border:none;">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu ">
                        <li><a class="dropdown-item" href="#">Edit</a></li>
                        <li><a class="dropdown-item" href="#">Block</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- message display Box --}}
    <div class="chat-box" id="chatBox">
        @php
            $lastDate = null; // Initialize the last date
            $messagesCount = count($messages); // Get the total count of messages
        @endphp
        @foreach ($messages as $key => $message)
            @php
               $currentDate = $message->created_at ? $message->created_at->format('Y-m-d') : null; // Format the date to 'Y-m-d'
            @endphp
            @if(Auth::user()->custom_id === $message->sender_id)
                <div class="message text-end " style="min-width: 80px;">
                    <div class="btn text-left">
                        <span>{{ $message->message }}</span>
                    </div>
                  
                </div>
            @else
                <div class="message text-start " style="min-width: 80px;">
                    <div class="btn btn-success text-left">
                        <span>{{ $message->message }}</span>
                    </div>
                    
                </div>
            @endif
            @if($key + 1 === $messagesCount) 
                <!-- Check if this is the last iteration -->
                @if ($currentDate !== $lastDate)
                    <div class="date">{{ $currentDate }}</div>
                    @php $lastDate = $currentDate; @endphp
                @endif
            @endif
        @endforeach
    </div>
    {{-- message sending form --}}
    <form id="chat-form" action="{{ route('send.message') }}" method="POST">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $user->custom_id }}">
        <input type="text" name="message" class="chat_input" placeholder="Message type..." required>
        <button type="submit" class="chat_btn btn btn-success"><i class="fas fa-paper-plane"></i></button>
    </form>
    {{-- laravel form securty token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
</div>
<script>
 
//     document.addEventListener('DOMContentLoaded', () => {
//     const chatForm = document.getElementById('chat-form');

//     chatForm.addEventListener('submit', async function (e) {
//         e.preventDefault();

//         const formData = new FormData(chatForm);
//         const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

//         try {
//             const response = await fetch(chatForm.action, {
//                 method: chatForm.method,
//                 headers: {
//                     'X-CSRF-TOKEN': csrfToken, // Add CSRF token
//                     'Accept': 'application/json', // Expect JSON response
//                 },
//                 body: formData, // Send form data
//             });

//             if (response.ok) {
//                 // const result = await response.json(); // Parse JSON response
//                 chatForm.reset(); // Clear form fields
//                 // Update the UI with the new message
//             } else {
//                 const errorData = await response.json();
//                 alert(`Error: ${errorData.message || 'Something went wrong.'}`);
//             }
//         } catch (error) {
//             console.error('Error:', error);
//             alert('Failed to send message. Please try again.');
//         }
//     });

//     Echo.private('chat')
//         .listen('MessageSent', (e) => {
//             console.log('New message:', e.message);
//             // Update the UI with the new message
//         });
// });

document.addEventListener('DOMContentLoaded', () => {
    const chatForm = document.getElementById('chat-form');
    const chatMessages = document.getElementById('chat-messages'); // Target the message container

    chatForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(chatForm);
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        try {
            const response = await fetch(chatForm.action, {
                method: chatForm.method,
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: formData,
            });

            if (response.ok) {
                chatForm.reset();
                // You can show "sending..." or spinner here if needed
            } else {
                const errorData = await response.json();
                alert(`Error: ${errorData.message || 'Something went wrong.'}`);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Failed to send message. Please try again.');
        }
    });

    // Laravel Echo listener
    Echo.private('chat')
        .listen('MessageSent', (e) => {
            if (chatMessages) {
                const messageEl = document.createElement('div');
                messageEl.classList.add('chat-message');
                messageEl.innerHTML = `
                    <strong>${e.message.user.name}</strong>: ${e.message.content}
                `;
                chatMessages.appendChild(messageEl);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
        });
});





</script>
<style>
    .custom-dropdown {
        width: 50px; /* Set your desired width */
    }
    /* Optional: Adjust padding for dropdown items if needed */
    .custom-dropdown .dropdown-item {
        padding: 5px 10px; /* Adjust padding for smaller height */
    }

    .chat-container{
        max-width: 500px;
        max-height: 100vh;
        margin: 0px auto;
        padding: 5px;
        border: 2px solid black;
        border-radius: 6px;
        overflow: hidden;
    }
    .chat-box {
        width: 100%;
        height: 51vh;
        overflow-y: auto; /* Enables vertical scrolling */
        display: flex;
        flex-direction: column-reverse;
        padding: 10px;
        /* Hide scrollbar */
        scrollbar-width: none; /* For Firefox */
        -ms-overflow-style: none; /* For Internet Explorer and Edge */
    }

    .chat-box::-webkit-scrollbar {
        display: none;
    }
    .message {
        margin: 8px 0;
    }
    .message img {
        width: 30px;
        height: 30px;
        border-radius: 50%;
    }
    .message span {
        margin-left: 10px;
    }
    .date {
        text-align: center;
        font-size: 12px;
        margin: 5px 0;
    }
    .header-image-chat-box img{
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }
    .header-name-chat-box{
        height: 40px;
        align-items: center;
    }
    .chat_input{
        width: 83%;
        float: left;
        color: black;
        font-size: 14px;
    }
    .chat_btn{
        margin: 10px 0;
        width: 10%;
    }
</style>
@endsection