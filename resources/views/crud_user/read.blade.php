@extends('dashboard')

@section('content')
<main class="my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6"> <!-- Bạn có thể giảm số cột tùy vào độ rộng bạn mong muốn -->
                <div class="card">
                    <div class="card-header text-center">
                        <span>Bảng chi tiết thông tin</span>
                    </div>
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="user-info w-100">
                        <div class="mb-4 text-center">
                        <img src="{{ asset('storage/' . $users->image) }}" alt="User Image" class="mb-3"width="100" height="100" />
                          </div>
                        <div class="mb-4 text-center"> <!-- Canh chỉnh nội dung ở giữa -->
                            
                                <div class="flex-grow-1 ms-3"> <!-- Thêm một khoảng cách nhỏ giữa ảnh và thông tin -->
            <div class="mb-1"><strong>Name:</strong> {{ $users->name }}</div>
            <div class="mb-1"><strong>Email:</strong> {{ $users->email }}</div>
            <!-- Thêm các thông tin khác ở đây -->
            <div class="mb-1"><strong>Phone:</strong> {{ $users->phone }}</div>
            <div class="mb-1"><strong>MSSV:</strong> {{ $users->mssv }}</div>
                            
                        </div>
                        <div class="mt-4 w-100 d-flex justify-content-around"> <!-- Đặt nút dưới cùng -->
                            <a href="{{ route('list') }}" class="btn btn-outline-secondary">Back</a>
                           
                        </div>
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</main> 
@endsection

@section('styles') 
<style> 
    .user-info label {
        display: block;
    }

    .card-body {
        padding: 1.25rem;
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: none;
    }
    
    .btn-outline-secondary {
        border-color: #6c757d;
        color: #6c757d;
    }

    .btn-outline-secondary:hover {
        border-color: #5a6268;
        color: #fff;
        background-color: #6c757d;
    }
</style> 
@endsection
