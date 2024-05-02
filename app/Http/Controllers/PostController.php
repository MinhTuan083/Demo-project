<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User_favorite;

class PostController extends Controller
{
    public function listPost()
    {
        $posts = Posts::paginate(2);

        return view('crud_user.post',['posts' => $posts]);
    }

}
