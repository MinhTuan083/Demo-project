@extends('dashboard')

@section('content')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="card" style="border: 1px solid black">
                    <h3 class="card-header text-center">Thông tin người dùng</h3>
                    <div class="row">
                        <!--image-->
                        <div class="col-lg-4 py-3">
                            <img src=" /./storage/{{ $user->image }} " class="imageChange img-fluid">
                        </div>

                        <div class="col-lg-8">
                            <div class="card-body">                          
                                <div class="form-floating mb-3">
                                    <input disabled value="{{ $user->mssv }}" type="phone" class="form-control" id="floatingInput">
                                    <label for="floatingInput">MSSV</label>
                                </div>
        
                                <div class="form-floating mb-3">
                                    <input disabled value="{{ $user->name }}" type="name" class="form-control" id="floatingInput">
                                    <label for="floatingInput">Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input disabled value="{{ $user->email }}" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
        
                                <div class="form-floating mb-3">
                                    <input disabled value="{{ $user->phone }}" type="phone" class="form-control" id="floatingInput">
                                    <label for="floatingInput">Phone</label>
                                </div>
        
                                <button class="btn btn-primary" type="button"><a class="text-white text-decoration-none" href="{{ route('edit.user', ['id' => $user->id ]) }}">Cập Nhật</a> </button>
                            </div>
                        </div>
                    </div>
                       
                </div>     
            </div>
        </div>
    </main>
    <div class="container">
    <div class="row">
        <h4>Profile (1-1)</h4>
        First name : {{$user->profile->first_name}} <br>
        Last name : {{$user->profile->last_name}} <br>
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
    
    <style>    
        .imageChange {
        height: auto;
        max-width: 100%;
    }
  
    </style>

@endsection