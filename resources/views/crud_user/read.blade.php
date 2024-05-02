@extends('dashboard')
@section('content')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
            <div class="card" style="border: 1px solid black">
                        <h3 class="card-header text-center">Read User</h3>
                        <div class="card-body" >
                        <div class="row">
                            <div class="col-4" > <img src=" /./storage/{{ $users->image }} " width="300" ></div>
                            <div class="col-8" >
                                <p>MSSV: {{$users->mssv}}</p>
                                <p>Name: {{$users->name}}</p>
                                <p>Email: {{$users->email}} </p>
                                <p>Phone: {{$users->phone}}</p>
                                <p>Favorities: {{$users->favorities}}</p>
                            </div>
                        </div>

                        <button type="button"><a href="{{ route('edit.user', ['id' => $users->id]) }}">Edit</a> </button>
                        </div>
                    </div>
                <div class="container">
                    <div class="row">
                        <h4>Profile (1-1)</h4>
                        @if(isset($user))
                        First name : {{$user->profile->first_name}} <br>
                        Last name : {{$user->profile->last_name}} <br>
                        @endif
                    </div>

                    <div class="row">
                        <h4>Danh sách bài viết đã viết (1 - N)</h4>
                        <table>
                            <thead>
                            <th>ID</th>
                            <th>Post name</th>
                            </thead>
                            <tbody>

                            @foreach($user->posts as $post)
                                <tr>
                                    <td>{{ $post->post_id }}</td>
                                    <td>{{ $post->post_name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <h4>Danh sách sở thích (N-N)</h4>
                        <table>
                            <thead>
                            <th>ID</th>
                            <th>Favorite</th>
                            </thead>
                            <tbody>
                            @foreach($user->favorities as $favorite)
                                <tr>
                                    <td>{{ $favorite->favorite_id }}</td>
                                    <td>{{ $favorite->favorite_name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
