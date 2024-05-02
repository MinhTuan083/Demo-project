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
                        <h3 class="card-header text-center">List favorities</h3>
                        <div class="card-body">
                        <table style=" border-collapse: collapse;">
                    
                    <tr>
                        <td>ID</td>                   
                        <td>Gavorities</td>
                    </tr>
                    <?php $i = 1 ;
                     ?>
                    @foreach($users as $user)
                        
                        <tr>
                            <th>{{ $i++ }}</th>
                           
                            <th>{{ $user->phone }}</th>
                        </tr>
                    @endforeach
                
                        </table>

                    </div>
          
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
