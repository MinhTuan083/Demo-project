<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User_favorite;

class PostController extends Controller
{
    public function listPosts()
    {
        $posts = Posts::all(); // Số lượng mục trên mỗi trang (ví dụ: 10)
        return view('posts.list', compact('posts')); // Trả về view và truyền danh sách sở thích
    }
    // public function deleteUser(Request $request)
    // {
    //     $user_id =$request->get('id');
    //     $user_Favorite = User_favorite::find($user_id);
    //     $user_Post = Posts::find($user_id);
    //     if ($user_Favorite != null || $user_Post != null) {
    //         return redirect("list")->withErrors('Không thể xóa vì user có bài viết hoặc sở thích');
    //     }
    //     $user = User::destroy($user_id);
    //     return redirect("list")->withSuccess('You have Signed-in');
    // }
}
