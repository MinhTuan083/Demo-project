@extends('dashboard')

@section('content')

    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="card" style="border: 1px solid black">
                    <h3 class="card-header text-center">List Favorities</h3>
                    <div class="card-body">
                        <table style="border-collapse: collapse;">
                            <tr>
                                <th>Favorite ID</th>
                                <th>Favorite Name</th>
                                <th>Favorite Description</th>
                                <th>Action</th>
                            </tr>
                            @if(isset($favorities))
                                @foreach($favorities as $favo)
                                    <tr>
                                        <td>{!! $favo->favorite_id !!}</td>
                                        <td>{!! $favo->favorite_name !!}</td>
                                        <td>{!! $favo->favorite_description !!}</td>
                                        <td>
                                            <form action="{{ route('favorite.delete', ['id' => $favo->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        table {
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
        }
        td, th {
            border: 1px solid black;
            text-align: center;
            width: 10%;
        }
    </style>

@endsection
