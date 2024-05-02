<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

//Unknow
class CustomAuthController extends Controller
{
    public function listFav()
    {
        $favorites = Favorite::all(); // Lấy danh sách các sở thích từ database
        return view('favorites.list', compact('favorites')); // Trả về view và truyền danh sách sở thích
    }

}
