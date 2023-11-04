<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUsereRequest;
use App\Jobs\UserMailJob;
use App\Mail\UserCreateMail;
use App\Models\GroupDetail;
use App\Models\Pfi;
use App\Models\Role;
use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UserManagementController extends Controller
{
    use UploadTrait;


    function __construct()
    {
        $this->middleware('permission:user-lists|user-create|user-edit|user-delete', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       /* $term=$request->query('term','');
        $sortParams = $request->query('sort', []);
        $startDate = $request->query('startDate');
        $endDate = $request->query('endDate');
        $status = $request->query('status');
        $users=User::search($term, $sortParams,$startDate,$endDate,$status)->get();*/
        $users = User::orderBy('id', 'desc')->with('roles')->get();

        return view('admin.user.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('id', 'desc')->get();

        return view('admin.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $url='';

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            if($request->hasFile('image')) {
                $imagePath =public_path($this->storage_path.$user->image);
                if(File::exists($imagePath)) {
                    File::delete($imagePath);
                }
                $file=$request->file('image');
                $path = 'uploads/users';
                $url = $this->ImageUpload($file,$path, '300', '300');
            }
            if ($url){
                $user->image = $url;
            }
            $user->password = bcrypt($request->password);
            $user->save();

            $user->assignRole($request->role);

            return redirect()->route('admin.users.index')->with('success', __('User has been Created Successfully'));
        }catch (\Exception $e) {
            return $e->getMessage();
            //Log::info($e->getMessage());
            return redirect()->back()->with('error', __('User is not Created Successfully'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $user =User::with('roles')->findOrFail($id);

        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // edit user form
        $user = User::findOrFail($id);
        $roles = Role::orderBy('id', 'desc')->get();
        return view('admin.user.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsereRequest $request, $id)
    {
        $url='';
        try {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            if($request->hasFile('image')) {
                $imagePath =public_path($this->storage_path.$user->image);
                if(File::exists($imagePath)) {
                    File::delete($imagePath);
                }
                $file=$request->file('image');
                $path = 'uploads/users';

                $url = $this->ImageUpload($file,$path, '250', '250');

            }
            if ($url){
                $user->image = $url;
            }
            if ($request->password){
                $user->password = bcrypt($request->password);
            }
            $user->save();
            DB::table('model_has_roles')
                ->where('model_id', $id)
                ->delete();
            $user->assignRole($request->role);

            return redirect()->back()->with('success', __('Profile Updated Successfully'));
        }catch (\Exception $e) {
            //Log::info();
            return redirect()->back()->with('error', __('Profile is not Updated Successfully'.$e->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $imagePath =public_path($this->storage_path.$user->image);
        if(File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $user->delete();

        return redirect()->back()->with('success', __('User has been deleted Successfully'));
    }
}
