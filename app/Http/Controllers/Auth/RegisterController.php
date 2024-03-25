<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    protected $barcodeGenerator;
    protected $userModel;

    public function index()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        $nama_lengkap = $request->input('nama_lengkap');
        $nomor_induk = $request->input('nomor_induk');
        $jurusan = $request->input('jurusan');
        $email = $request->input('email');
        $username = $request->input('username');
        $no_hp = $request->input('no_hp');
        $barcode = $request->input('barcode');
        $password = $request->input('password');

        $user = new User();

        $user->nama_lengkap = $nama_lengkap;
        $user->nomor_induk = $nomor_induk;
        $user->jurusan = $jurusan;
        $user->email = $email;
        $user->username = $username;
        $user->no_hp = $no_hp;
        $user->barcode = $barcode;
        $user->password = $password;

        $user->save();
        if ($user) {
            return response([
                'pesan' => 'user berhasil',
                'user$user' => $user,
            ], 200);
        } else {
            return response([
                'pesan' => 'Gagal',
            ], 404);
        }

        // return redirect()->route('user.login')->with('success', 'User registered successfully!');
        return view('user.login', ['title' => "Login"]);
    }

    public function __construct(BarcodeGeneratorPNG $barcodeGenerator, User $userModel)
    {
        $this->barcodeGenerator = $barcodeGenerator;
        $this->userModel = $userModel;
    }

    public function generateBarcode($userData)
    {
        $generator = new BarcodeGeneratorPNG();
        $barcode = 'data:image/png;base64,' . base64_encode($generator->getBarcode($userData, $generator::TYPE_CODE_128));
        return $barcode;
    }

    public function showRegisterForm(Request $request)
    {
        $userData = "data pengguna";
        $barcode = $this->generateBarcode($userData);
        
        $register = $this->register($request);

        return view('user.register', ['barcode' => $barcode, 'register' => $register]);
    }
}