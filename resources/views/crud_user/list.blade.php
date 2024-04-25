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
                        <h3 class="card-header text-center">List User</h3>
                        <div class="card-body">
                        <table style=" border-collapse: collapse;">
                    
                    <tr>
                        <td>MSSV</td>
                        <td>Image</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Favorities</td>
                        <td>Action</td>
                    </tr>
                    <?php $i = 1 ;
                     ?>
                    @foreach($users as $user)
                        
                        <tr>
                            <th>{{ $user->mssv }}</th>
                            <th><img src=" /./storage/{{ $user->image }} " width="100" ></th>
                            <th>{{ $user->name }}</th>
                            <th>{{ $user->email }}</th>
                            <th>{{ $user->phone }}</th>
                            <th>{!! $user->favorities !!}</th>
                            
                            <th>
                                <a href="{{ route('user.readUser', ['id' => $user->id]) }}" class="btn btn-primary btn-sm m-2">View</a> 
                                <a href="{{ route('edit.user', ['id' => $user->id]) }}" class="btn btn-primary btn-sm  m-2">Edit</a> <br>
                                <a href="{{ route('crud_user.deleteUser', ['id' => $user->id]) }} " onclick="return confirm('Are you sure you want to delete this usere?');" class="btn btn-danger btn-sm mb-2">Delete</a> 

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
