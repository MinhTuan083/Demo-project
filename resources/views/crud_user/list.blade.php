

@extends('dashboard')

@section('content')

    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                    <div class="card" style="border: 1px solid black">
                        <h3 class="card-header text-center">Đăng nhập</h3>
                        <div class="card-body">
                        <table style=" border-collapse: collapse;">
                    
                    <tr>
                        <td>ID</td>
                        <td>Image</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Action</td>
                    </tr>
                    <?php $i = 1 ;
                     ?>
                    @foreach($users as $user)
                        
                        <tr>
                            <th>{{ $i++ }}</th>
                            <th><img src=" /./storage/{{ $user->image }} " width="100px"></th>
                            <th>{{ $user->name }}</th>
                            <th>{{ $user->email }}</th>
                            <th>{{ $user->phone }}</th>
                            <th>
                               <button type="button"> <a href="{{ route('view.user', ['id' => $user->id]) }}">View</a> </button>
                                <button type="button"><a href="{{ route('edit.user', ['id' => $user->id]) }}">Edit</a> </button>
                                <button type="button"><a href="{{ route('crud_user.deleteUser', ['id' => $user->id]) }}" class="btn btn-danger btn-sm">Delete</a> </button>

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
        text-align: center;
        width: 10%;}
    </style>
@endsection
