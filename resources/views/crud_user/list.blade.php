@if (session('message'))
    <script>
    window.onload = function() {
        alert('{{ Session::get('message') }}');
    }
    </script>
@endif

@extends('dashboard')

@section('content')

    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                    <div class="card" style="border: 1px solid black">
                        <h3 class="card-header text-center">Danh sách user  </h3>
                        <div class="card-body">
                        <table style=" border-collapse: collapse;">
                    
                    <tr>
                        <td>MSSV</td>
                        <td>Image</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Favorites</td>
                        <td>Action</td>
                    </tr>

                    @foreach($users as $user)
                        
                        <tr>
                            <th>{{ $user->mssv }}</th>
                             <th><img src=" /./storage/{{ $user->image }}" class="img-fluid"  max-with="100%" height ="auto"></th>
                            <th>{{ $user->name }}</th>
                            <th>{{ $user->email }}</th>
                            <th>{{ $user->phone }}</th>
                            <th>{!!$user->sothich !!}</th>
                            <th>
                                <button type="button"><a href="{{ route('view.user', ['id' => $user->id]) }}" class="text-decoration">View</a> </button>
                                <button type="button"><a href="{{ route('edit.user', ['id' => $user->id]) }}">Edit</a> </button>
                                <button type="button"><a href="{{ route('crud_user.deleteUser', ['id' => $user->id]) }}" 
                                onclick="return confirm('Bạn có muốn xóa người dùng {{$user -> name}} không?');"
                                class="btn btn-danger btn-sm">Delete</a> </button>

                            </th>
                        </tr>
                    @endforeach
                
                        </table>
                       <div > 
                       {{ $users->render('vendor.pagination.custom') }}</div>
                        </div>
                    </div>
            <!-- Phan trang -->
           
            </div>
        </div>
        
    </main>
    <style>
        table{
    border-collapse: collapse;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 20px;
    
    }
    td,th{
        border: 1px solid black;
        width: 10%;
    }

    td{
        text-align: center;

    }
    </style>
    
@endsection
