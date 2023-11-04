<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pfi;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class BackendController extends Controller
{
    use UploadTrait;
    function __construct()
    {
        $this->middleware('permission:user-profile', ['only' => ['profile', 'updateProfile', 'updatePassword']]);
    }


    public function profile(){
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request  $request){

        $url='';
        $user = Auth::user();
        $request->validate([
            'name'      => 'required|string',
            'email'     => ['required', Rule::unique('users')->ignore($user->id)],
            'phone'    => ['required','regex:/(01)[0-9]{9}/', Rule::unique('users')->ignore($user->id)],
        ]);
        if(request()->hasFile('image') && request('image') != '' ) {
            $imagePath =public_path($this->storage_path.$user->image);
            if(File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $file=$request->file('image');
            $path = 'uploads/users';
            $url = $this->ImageUpload($file,$path, '300', '300');
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($url){
            $user->image = $url;
        }
        $user->update();

        return redirect()->back()->with('success', __('Profile Updated Successfully'));
    }

    public function updatePassword(Request  $request){

        $request->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation'     => 'required',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->update();

        return redirect()->back()->with('success', __('Password Updated Successfully'));
    }


    public function markAsRead(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }
    public function markAsReadHeader(Request $request){
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }



}
