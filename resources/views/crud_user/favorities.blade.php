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
                        <td>Sở thích</td>                     
                        <td></td>
                    </tr>
                    <?php $i = 1?>
                    @foreach($favorities as $favority)
                        
                        <tr>
                            <th>{{ $i++ }}</th>
                            <th>{{ $favority->favorite_name }}</th>
                        </tr>
                    @endforeach
            
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
