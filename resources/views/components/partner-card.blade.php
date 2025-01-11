 {{-- User Details Display Card code  --}}
 <div class="row justify-content-around p-2">
   
    @foreach ($users as $data) 
        <div class="col-md-5 col-12 row mb-2">
            <div class=" col-4 p-1" >
                <img src="{{ asset($data['profile_image'] ? 'storage/' . $data['profile_image'] : 'images/set_partner_per.jpg')}}" 
                alt="User Image" style="height: 180px;">
            </div>
            <div class="col-md-7 col-8 p-md-2">
                <div class="matrimony-id">Matrimony ID : {{ $data['custom_id'] }}</div>
                <div class="details">
                    <strong>{{ $data['age']  }}/ 5'09" (175 cm) / Never Married</strong>
                    Hindu, Prajapati, Hindi, Bhopal, Madhya Pradesh, India
                </div>
                <div class="actions action-btn row p-md-2 justify-content-around">
                    <button class="view-profile col-5">View Profile</button>
                    <button class="contact-now col-5">Contact Now</button>
                </div>
            </div>
        </div>
    @endforeach

    {{-- <div class="col-md-5 col-12 row mb-2">
        <div class=" col-4 p-1">
            <img src="{{ asset( 'images/default.jpg') }}" alt="User Image">
        </div>
        <div class="col-md-7 col-8 p-md-2">
            <div class="matrimony-id">Matrimony ID : MI-806981</div>
            <div class="details">
                <strong>23 / 5'09" (175 cm) / Never Married</strong>
                Hindu, Prajapati, Hindi, Bhopal, Madhya Pradesh, India
            </div>
            <div class="actions row p-md-2 justify-content-around">
                <button class="view-profile col-5">View Profile</button>
                <button class="contact-now col-5">Contact Now</button>
            </div>
        </div>
    </div>     --}}
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
    
</style>