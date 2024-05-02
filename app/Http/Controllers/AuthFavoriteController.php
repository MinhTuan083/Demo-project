<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Favorities;
use App\Models\Profile;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;

//Unknow
class AuthFavoriteController extends Controller
{
    

    /**
     * List of users
     */
    public function listFavorities()
    {
            $favorities = favorities::all();
            return view('favorities', ['favorities' => $favorities]);
        
    }


    public function listPosts()
    {
            $posts = posts::all();
            return view('post', ['posts' => $posts]);
        
    }

    public function deletePost()
    {       
        $post_id = $request->get('post_id');
        $post = User::destroy($post_id);

        return redirect("list_posts")->withSuccess('You have signed-in');
        
    }

    
}
