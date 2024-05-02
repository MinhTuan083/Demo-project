@extends('dashboard')

@section('content')
<main class="signup-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header text-center">Create Favorite</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('favorites.store') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <input type="text" placeholder="Favorite Name" id="favorite_name" class="form-control" name="favorite_name" required autofocus>
                                @error('favorite_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <textarea placeholder="Favorite Description" id="favorite_description" class="form-control" name="favorite_description" required></textarea>
                                @error('favorite_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-dark btn-block">Create Favorite</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
