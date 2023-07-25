<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //

    public function kullaniciEkle()
    {
        return view('kullanici_ekle');
    }

    public function kullaniciKaydet(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'tel' => ['required', 'unique:users'],
        ]);
        //dd($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            return redirect()->route('home');
        } else {
            return back()->withErrors(['error' => 'Kullanici Eklenemedi. Lutfen Tekrar Deneyin !!!']);
        }
    }

    public function iptal()
    {
        return redirect()->route('home');
    }

    public function update($id)
    {
        //return $id;
        $user = User::where('id', $id)->first();

        //dd($user);
        return view('kullanici_update', ['user' => $user]);
    }

    public function saveUpdate(Request $request, $id)
    {
        $userId = $request->route('id');
        $request->validate([
            'name' => ['required'],
            'tel' => ['required', Rule::unique('users')->ignore($userId)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($userId)],
        ]);
        //dd($request->all());
        $user = User::find($id);
        if ($user) {

            if ($request->filled('password')) {
                $new_password = Hash::make($request->password);
            } else {
                $new_password = $request->password;
            }
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'tel' => $request->tel,
                'role' => $request->role,
                'password' => $new_password,
            ]);

            $user->save();

            return redirect()->route('home');
        } else {
            return redirect()->back()->withErrors('Kullanici Guncellenemedi. Lutfen Tekrar Deneyin !!!');
        }
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        //dd($user);
        $user->delete();

        return back();
    }

    public function profile()
    {
        //the user who has this id value
        $user = Auth::user();

        return view('profil_sayfasi', ['user' => $user]);
    }

    public function updateProfileImage(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'profil_resmi' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profil_resmi')) {
            // Supprimez l'ancienne image s'il en existe une
            Storage::delete('profile_images/' . $user->image);

            // Enregistrez la nouvelle image
            $image = $request->file('profil_resmi');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profile_images'), $imageName);

            // Mettez à jour le chemin de l'image dans la base de données
            $save = User::where('id', $user->id);
            $save->update([
                'image' => $imageName,
            ]);
        }

        return redirect()->route('profile')->with('success', 'Profil Resimi Başariyla Guncellenmistir !!!');
    }
}
