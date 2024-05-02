<?php

namespace App\Http\Controllers;
use App\Models\Favorities; // Thay đổi đường dẫn tương ứng với cấu trúc thư mục của bạn

use Illuminate\Http\Request;
class FavoritiesController extends Controller
{
    //


    public function listFavoritesByUserID(Request $request)
    {
        $user_id = $request->get('id');
        
        // Truy vấn các mục ưa thích của người dùng dựa trên user_id
        $favorites = Favorities::where('user_id', $user_id)->get();
        
        // Truyền danh sách mục ưa thích đến view để hiển thị
        return view('crud_user.read', ['favorites' => $favorites]);
    }
    
}
