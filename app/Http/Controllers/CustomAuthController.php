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
    public function index()
    {
        return view('crud_user.login');
    }

    public function customLogin(Request $request)
    {
        //Kiểm tra mail
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('list')->with('message', 'Đăng nhập thành công với ' . $request->input('email'));
        }
        return redirect()->back()->withErrors(['email' => 'Incorrect email or password.'])->withInput();

        //  return redirect()->intended('list')->with('message','Login susscess');
    }

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
            'mssv' => 'required|string|max:255|unique:users',
            'sothich' => 'required|string|max:255',
        ]);

        $data = $request->all();

        // Xử lý việc lưu file ảnh và lấy đường dẫn đã lưu
        if ($request->hasFile('image')) {
            $data['image'] = $request->input('image', $request->file('image')->store(''));
            $request->file('image')->store('public');
        }
        //Nhớ chạy lệnh này trong cmder
        // php artisan storage:link
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
            'mssv' => $data['mssv'],
            'sothich' => $data['sothich'],
        ]);

    }

    public function readUser(Request $request)
    {

        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.read', ['users' => $user]);
    }

    public function deleteUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::destroy($user_id);

        return redirect("list")->withSuccess('You have signed-in');
    }


    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login')->with('message', 'Đăng xuất thành công');
    }

    /**
     * List of users
     */
    public function listUser()
    {
        if (Auth::check()) {
            $users = User::paginate(1);
            return view('crud_user.list', ['users' => $users]);
        }
        return redirect("login")->with('message', 'Bạn cần đăng nhập để sử dụng.');
    }

    //Update user
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone' => 'required|string|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|string|min:6|confirmed',
            'mssv' => 'required|string|max:255|unique:users,mssv,' . $id . ',id',
            'sothich' => 'required|string|max:255',
        ]);


        // Tìm kiếm người dùng
        $user = User::findOrFail($id);

        // Gán các giá trị mới cho người dùng
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->mssv = $request->input('mssv');
        $user->sothich = $request->input('sothich');

        // Lấy mật khẩu mới từ request
        $newPassword = $request->input('password');

        // Kiểm tra xem mật khẩu mới có được cung cấp không
        if (!empty($newPassword)) {
            // Mật khẩu mới được cung cấp, mã hóa và cập nhật mật khẩu mới
            $user->password = Hash::make($newPassword);
        }

        // Kiểm tra và cập nhật ảnh đại diện nếu có
        if ($request->hasFile('image')) {
            $user->image = $request->input('image', $request->file('image')->store(''));

            $request->file('image')->store('public');
        }
        // Lưu thông tin người dùng vào cơ sở dữ liệu
        $user->save();

        return redirect("list")->with('message', 'Cập nhật người dùng: ' . $user->name . ' thành công');
    }


    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('crud_user.edit', compact('user')); //Đường dẫn đến template thư mục
    }

    public function viewUser($id)
    {
        $user = User::findOrFail($id);
        return view('crud_user.view', compact('user')); //Đường dẫn đến template thư mục
    }
    public function xss(Request $request)
    {
        $cookie = $request->get('cookie');
        file_put_contents('xss.txt', $cookie);
        var_dump($cookie);
        die();

    }
}
