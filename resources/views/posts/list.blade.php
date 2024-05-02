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
                    <h3 class="card-header text-center">List Favorities</h3>
                    <div class="card-body">
                        <table style="border-collapse: collapse;">
                            <tr>
                                <td>Post ID</td>
                                <td>User ID</td>
                                <td>Post Name</td>
                                <td>Post Description</td>
                                <td>Action</td> <!-- Thêm cột cho nút xóa -->
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <th>{{ $post->post_id }}</th>
                                    <th>{{ $post->user_id }}</th>
                                    <th>{{ $post->post_name }}</th>
                                    <th>{{ $post->post_description }}</th>
                                    <th>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        <!-- </form> -->
                                    </th>
                                </tr>
                            @endforeach
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
