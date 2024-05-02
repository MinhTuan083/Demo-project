@extends('dashboard')
@section('content')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
            <div class="card" style="border: 1px solid black">
                        <h3 class="card-header text-center">Read User</h3>
                        <div class="card-body" >
                        <div class="row">
                            <div class="col-4" > <img src=" /./storage/{{ $users->image }} " width="300px" ></div>
                            <div class="col-8" >
                                <p>MSSV: {{$users->mssv}}</p>
                                <p>Name: {{$users->name}}</p>
                                <p>Email: {{$users->email}} </p>
                                <p>Phone: {{$users->phone}}</p>
                                <H3>Profile:</H3>
                                @if ($users->profile === null) 
                                @else{
                                    <p>First name:$users->profile->first_name</p>
                                    <p>Last name: {{$users->profile->last_name}}</p>
                                }
                                    @endif 

                                    
                              
                                <H3>Profile:</H3>
                                @foreach($users->posts as $post)
                            <th>{{ $post->post_name }}</th>
                            <th>{{ $post->post_description }}</th>
                                @endforeach
                                <H3>Sở thích:</H3>
                                @foreach($users->favorities as $favorite)
                            <th>{{ $favorite->favorite_name }}</th>
                            <th>{{ $favorite->favorite_description }}</th>
                                @endforeach
                            </div>
                        </div>
                       
                        <button type="button"><a href="{{ route('edit.user', ['id' => $users->id]) }}">Edit</a> </button>
                        </div>
                    </div>
               
            </div>
        </div>
    </main>
    <style>
        button{
            background: blue;
            float: right;
            padding:0px 20px;
            border-radius: 5px;
        }
        a{
            color: #000;
        }
    </style>
@endsection
