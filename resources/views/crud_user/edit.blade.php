

@extends('dashboard')

@section('content')
<main class="signup-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Update User</h3>
                    <div class="card-body">
                    <form method="POST" action="{{ route('update.user', ['id' => $user->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('GET')
    <div class="form-group mb-3">
        <input type="text" placeholder="Name" id="name" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="form-group mb-3">
        <input type="text" placeholder="Email" id="email_address" class="form-control" name="email" value="{{ $user->email }}" required>
        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>
   <!-- Trường mật khẩu -->
<div class="form-group mb-3">
    <input type="password" placeholder="Password" id="password" class="form-control" name="password" >
    @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
    @endif
</div>
<div class="form-group mb-3">
    <input type="password" placeholder="Confirm Password" id="password-confirm" class="form-control"  name="password_confirmation" >
    @if ($errors->has('password_confirmation'))
        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
    @endif
</div>

    <!-- Trường điện thoại -->
    <div class="form-group mb-3">
        <input type="text" placeholder="Phone" id="phone" class="form-control" name="phone" value="{{ $user->phone }}" required>
        @if ($errors->has('phone'))
            <span class="text-danger">{{ $errors->first('phone') }}</span>
        @endif
    </div>

    <!-- Trường ảnh -->
    <div class="form-group mb-3">
        <label for="image">Choose profile image</label>
        <input type="file" id="image" class="form-control" name="image" accept="image/*">
        @if ($errors->has('image'))
            <span class="text-danger">{{ $errors->first('image') }}</span>
        @endif
    </div>

     <!--Trường mssv-->
     <div class="form-group mb-3">
                                <input type="text" placeholder="MSSV" id="mssv" class="form-control" name="mssv" value="{{ $user->mssv }}" required>
                                @if ($errors->has('mssv'))
                                    <span class="text-danger">{{ $errors->first('mssv') }}</span>
                                @endif
                            </div>
    
    <div class="form-group mb-3">
        <button type="submit" class="btn btn-dark btn-block">Update</button>
    </div>
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection