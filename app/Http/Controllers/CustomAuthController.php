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
    


    public function registration()
    {
        return view('crud_user.registration');
    }

    public function customRegistration(Request $request) 
{ 
    $request->validate([ 
        'name' => 'required|string|max:255', 
        'email' => 'required|string|email|max:255|unique:users', 
        'password' => 'required|string|min:6|confirmed',
        'phone' => 'required|string|max:15', 
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
    ]); 

    $data = $request->all(); 

    // Xử lý việc lưu file ảnh và lấy đường dẫn đã lưu
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('profile_images');
    }
    $check = $this->create($data); 
    return redirect("dashboard")->withSuccess('You have signed-in'); 
}

public function create(array $data) 
{ 
    return User::create([ 
        'name' => $data['name'], 
        'email' => $data['email'], 
        'password' => Hash::make($data['password']), 
        'phone' => $data['phone'], // Lưu trữ số điện thoại
        // Lưu trữ đường dẫn ảnh với 'image_path' là tên cột trong database
        'image' => $data['image'] ?? null, 
    ]); 
} 
  

   
   
   
    public function deleteUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::destroy($user_id);

        return redirect("list")->withSuccess('You have signed-in');
    }
}