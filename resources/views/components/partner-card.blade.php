 {{-- User Details Display Card code  --}}
 <div class="row justify-content-around p-2">
    @foreach ($users as $data) 
        <div class="col-md-5 col-12 row mb-2">
            <div class=" col-4 p-1" >
                <img src="{{ asset($data['profile_image'] ? 'storage/' . $data['profile_image'] : 'images/set_partner_per.jpg')}}" 
                alt="User Image" class="partner_img" style="height: 180px;">
            </div>
            <div class="col-md-7 col-8 p-md-2">
                <div class="matrimony-id">Matrimony ID : {{ $data['custom_id'] }}</div>
                <div class="details">
                    <strong>{{ $data['age']  }}/ 5'09" (175 cm) / Never Married</strong>
                    {{ !empty($data['mother_tongue']) ? $data['mother_tongue'].", " : ''}}
                    {{ !empty($data['caste']) ? $data['caste'].', ' : ''}}
                    {{ !empty($data['religion']) ? $data['religion'].', ' : ''}}
                    {{ !empty($data['city']) ? $data['city'].', ' : ''}}
                    {{ !empty($data['state']) ? $data['state'].', ' : ''}}
                    {{ !empty($data['country']) ? $data['country'] : ''}}
                </div>
                <div class="actions action-btn row p-md-2 justify-content-around">
                    <a href="{{route('show-profile', $data['custom_id'])}}" class="view-profile btn text-white col-5">View</a>
                    <a href="{{ route('partner.contact', ['id' => $data['custom_id']]) }}" class="contact-now view-profile btn text-white col-5">
                        <i class="bi bi-chat icon" title="Chat"></i>Chat
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
<style>
     img{
        width: 100%;
        height: 180px;
        border-radius: 8px;
    }

    .card img {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }
    .matrimony-id {
        color: #d9534f;
        
        font-weight: bold;
        margin: 10px 0;
    }

    .details {
        font-size: 14px;
        color: #555;
        line-height: 1.5;
    }

    .details strong {
        display: block;
        margin-bottom: 5px;
    }

    .actions {
        margin-top: 10px;
        display: flex;
        justify-content: space-around;
    }
    .actions button {
        border: none;
        border-radius: 4px;
        padding: 10px;
        color: white;
        font-size: 14px;
        cursor: pointer;
    }
    .actions .view-profile {
        background-color: #0275d8;
    }
    .actions .contact-now {
        background-color: #d9534f;
    }

    .actions button:hover {
        opacity: 0.9;
    }
    
    @media (max-width: 520px) {
        .partner_img {
            height: 150px;
        }
    }
    
</style>