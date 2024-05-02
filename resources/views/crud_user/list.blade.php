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
                        <td>Favorite ID</td>
                        <td>Favorite Name</td>
                        <td>Favorite Description</td>

                    </tr>
                    <?php $i = 1 ;
                     ?>
                    @foreach($item as $item)
                        
                        <tr>
                            <th>{{ $item->favorite_id }}</th>
                            <th>{{ $item->favorite_name }}</th>
                            <th>{{ $item->favorite_description	 }}</th>
                            <th>

                            </th>
                        </tr>
                    @endforeach
                
                        </table>
                       <div > 
                       {{ $item->render('vendor.pagination.custom') }}</div>
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
