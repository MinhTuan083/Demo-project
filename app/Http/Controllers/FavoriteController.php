<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Favorities;

//Unknow
class FavoriteController extends Controller
{
    public function listFav()
    {
        $favorities = Favorities::paginate(2);
        return view('crud_user.favorite',['favorities' => $favorities]);
    }

    public function deleteUser($id)
    {
        $user = User::with('post', 'favorite')->findOrFail($id);

        if ($user->post->count() > 0 || $user->favorite->count() > 0) {
            return redirect()->back()->with('error', 'Không thể xóa người dùng này do họ có bài viết hoặc sở thích.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'Người dùng đã được xóa.');
    }

}
