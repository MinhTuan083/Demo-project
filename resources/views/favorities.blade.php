

@extends('dashboard')

@section('content')

    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                    <div class="card" style="border: 1px solid black">
                        <h3 class="card-header text-center">Favorities</h3>
                        <div class="card-body">
                        <table style=" border-collapse: collapse;">
                    
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Description</td>
                    </tr>
                    <?php $i = 1 ;
                     ?>
                    @foreach($favorities as $favorite)
                        
                        <tr>
                            <th>{{ $favorite->favorite_id }}</th>
                            <th>{{ $favorite->favorite_name }}</th>
                            <th>{{ $favorite->favorite_description }}</th>

                            </th>
                        </tr>
                    @endforeach
                
                        </table>
                       <div > 
                      
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
