<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\Favorities;

//Unknow
class FavoriteController extends Controller
{
    public function listFav()
    {
        $favorities = Favorities::paginate(2); // Số lượng mục trên mỗi trang (ví dụ: 10)
        return view('favorities.list', compact('favorities')); // Trả về view và truyền danh sách sở thích
    }

    public function deleteUser($id)
{
    $user = user_profile::findOrFail($id);

    // Kiểm tra xem người dùng có bài viết không
    $hasPosts = $user->posts()->exists();

    // Kiểm tra xem người dùng có sở thích không
    $hasFavorites = $user->favorites()->exists();

    if ($hasPosts || $hasFavorites) {
        // Nếu người dùng có bài viết hoặc sở thích, không được phép xóa
        return redirect()->back()->with('error', 'Không thể xóa người dùng có bài viết hoặc sở thích.');
    }

    // Nếu không có bài viết hoặc sở thích, xóa người dùng
    $user->delete();

    return redirect()->route('users.index')->with('success', 'Người dùng đã được xóa thành công.');
}

}
