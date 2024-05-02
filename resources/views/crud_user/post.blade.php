{{-- resources/views/posts.blade.php --}}
@extends('layouts.app')

@section('content')
    <!-- Danh sách bài viết -->
    <h2>Danh sách bài viết của người dùng</h2>
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

        </tr>
    @endforeach
@endsection
