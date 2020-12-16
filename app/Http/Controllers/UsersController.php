<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        $user_role = auth()->user()->menuroles;
  
        $role_id = DB::table('users')
        ->join('roles', 'users.menuroles', '=', 'roles.name')
        ->where('users.menuroles', '=', $user_role)
        ->value('roles.id');

        $tempUsers = DB::table('users')
            ->join('roles', 'users.menuroles', '=', 'roles.name')
            ->select('roles.id as role_id', 'users.*')
            ->get()
            ->toArray();

        $users = [];
        foreach($tempUsers as $user){
            if($role_id == 2){
                if($user->role_id >= $role_id){
                    $users[] = $user;
                }
            }else{
                if($user->role_id > $role_id){
                    $users[] = $user;
                }
            } 
        }

        return view('dashboard.admin.usersList', compact('users', 'you'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_role = auth()->user()->menuroles;
        $role_id = DB::table('roles')
                    ->where('name', $user_role)
                    ->value('id');
        $roles = DB::table('roles')
                    ->where('id', '>', $role_id)
                    ->whereNotIn('id', [7, 9, 10])
                    ->get()
                    ->toArray();

        return view('dashboard.admin.userCreate', [ 'roles' => $roles ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|between:2,100|unique:users,name',
            'email' => 'required|string|email|max:100|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
            'menuroles' => 'required|string',
        ]);
        
        $userRole = $request->input('menuroles');

        if($userRole === 'mywayAdmin' || $userRole === 'schoolAdmin' || $userRole === 'principal'){
            $user = new User();
            $user->name     = $request->input('name');
            $user->password     = Hash::make($request->input('password'));
            $user->email     = $request->input('email');
            $user->menuroles   = $request->input('menuroles');
            $user->status = 1;
            $user->created_at = date('Y-m-d H:i:s');
            $user->save();
            $request->session()->flash('message', '成功建立使用者');
        }

        if($userRole === 'student'){
            $validatedData = $request->validate([
                'parent_a_username' => 'required|string|between:2,100|unique:users,name',
                'parent_a_name' => 'required|string|max:100',
                'parent_a_email' => 'required|string|email|max:100|unique:users,email',
                'parent_a_password' => 'required|string|min:6',
                'parent_a_line' => 'required|string|max:100',
                'parent_b_username' => 'required|string|between:2,100|unique:users,name',
                'parent_b_name' => 'required|string|max:100',
                'parent_b_email' => 'required|string|email|max:100|unique:users,email',
                'parent_b_password' => 'required|string|min:6',
                'parent_b_line' => 'required|string|max:100',
                'chinese_name' => 'required|string|max:100',
                'english_name' => 'required|string|max:100',
                'line' => 'required|string|max:100',
                'start_date' => 'required',
                'expire_date' => 'required',
                'other' => 'required|string|max:100',
            ]);

            try {
                DB::beginTransaction();
                
                $parent_a_id = DB::table('users')->insertGetId([ 
                    'name' => $request->parent_a_username,
                    'email' => $request->parent_a_email,
                    'password' => bcrypt($request->parent_a_password), 
                    'menuroles' => 'parent',
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
      
                $parent_info_a = DB::table('users_parent_infos')->insertGetId([ 
                    'user_id' => $parent_a_id,
                    'name' => $request->parent_a_name,
                    'telephone' => $request->parent_a_telephone,
                    'line' => $request->parent_a_line,
                    'email' => $request->parent_a_email,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
    
                $parent_b_id = DB::table('users')->insertGetId([ 
                    'name' => $request->parent_b_username,
                    'email' => $request->parent_b_email,
                    'password' => bcrypt($request->parent_b_password), 
                    'menuroles' => 'parent',
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
    
                $parent_info_b = DB::table('users_parent_infos')->insertGetId([ 
                    'user_id' => $parent_b_id,
                    'name' => $request->parent_b_name,
                    'telephone' => $request->parent_b_telephone,
                    'line' => $request->parent_b_line,
                    'email' => $request->parent_b_email,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
    
                $student_id = DB::table('users')->insertGetId([ 
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password), 
                    'menuroles' => 'student',
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
    
                $student = DB::table('users_student_infos')->insert([
                    'user_id' => $student_id,
                    'class_id' => $request->class_id ? $request->class_id : null,
                    'chinese_name' => $request->chinese_name,
                    'english_name' => $request->english_name,
                    'line' => $request->line,
                    'parent_1_id' => $parent_info_a,
                    'parent_2_id' => $parent_info_b ? $parent_info_b : null,
                    'other' => $request->other,
                    'start_date' => $request->start_date,
                    'expire_date' => $request->expire_date,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
    
                DB::commit();
    
            } catch(\Exception $e) {
                DB::rollBack();
            }
        }

        if($userRole === 'teacher' || $userRole === 'assistant'){
            $validatedData = $request->validate([
                'chinese_name' => 'required|string|max:100',
                'english_name' => 'required|string|max:100',
                'line' => 'required|string|max:100',
                'telephone' => 'required'
            ]);

            try {
                DB::beginTransaction();
                
                $teacherId = DB::table('users')->insertGetId([ 
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password), 
                    'menuroles' => $userRole,
                    'created_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ]);

                $teacherInfoId = DB::table('users_teacher_infos')->insertGetId([ 
                    'user_id' => $teacherId,
                    'chinese_name' => $request->chinese_name,
                    'english_name' => $request->english_name,
                    'telephone' => $request->telephone,
                    'line' => $request->line,
                    'address' => $request->address,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
 
                DB::commit();
    
            } catch(\Exception $e) {
                DB::rollBack();
            }
        }


        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $userInfo = [];
        if($user->menuroles === 'teacher' || $user->menuroles === 'assistant'){
            $userInfo['base'] = DB::table('users_teacher_infos as t')
            ->join('users as u', 'u.id', '=', 't.user_id')
            ->where('u.id', $id)
            ->select('u.email', 'u.name', 't.*')
            ->get()
            ->first();
        }

        if($user->menuroles === 'parent'){
            $userInfo['base'] = DB::table('users_parent_infos as p')
            ->join('users as u', 'u.id', '=', 'p.user_id')
            ->where('u.id', $id)
            ->select('u.email', 'u.name', 'p.*')
            ->get()
            ->first();
        }

        if($user->menuroles === 'student'){
            $userInfo['base'] = DB::table('users_student_infos as s')
            ->join('users as u', 'u.id', '=', 's.user_id')
            ->where('u.id', $id)
            ->select('u.email', 'u.name', 's.*')
            ->get()
            ->first();

            $userInfo['parent'][0] = DB::table('users_parent_infos as s')
            ->join('users as u', 'u.id', '=', 's.user_id')
            ->where('u.id', $userInfo['base']->parent_1_id)
            ->select('u.email', 'u.name as account', 's.*')
            ->get()
            ->first();

            $userInfo['parent'][1] = DB::table('users_parent_infos as s')
            ->join('users as u', 'u.id', '=', 's.user_id')
            ->where('u.id', $userInfo['base']->parent_2_id)
            ->select('u.email', 'u.name as account', 's.*')
            ->get()
            ->first();
        }

        return view('dashboard.admin.userShow', compact( 'user', 'userInfo' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $user_role = auth()->user()->menuroles;
        $role_id = DB::table('roles')->where('name', $user_role)->value('id');
        $roles = DB::table('roles')->where('id', '>', $role_id)->get()->toArray();
        $userInfo = [];
        if($user->menuroles === 'teacher' || $user->menuroles === 'assistant'){
            $userInfo['base'] = DB::table('users_teacher_infos as t')
            ->join('users as u', 'u.id', '=', 't.user_id')
            ->where('u.id', $id)
            ->select('u.email', 'u.name', 't.*')
            ->get()
            ->first();
        }

        if($user->menuroles === 'parent'){
            $userInfo['base'] = DB::table('users_parent_infos as p')
            ->join('users as u', 'u.id', '=', 'p.user_id')
            ->where('u.id', $id)
            ->select('u.email', 'u.name', 'p.*')
            ->get()
            ->first();
        }

        if($user->menuroles === 'student'){
            $userInfo['base'] = DB::table('users_student_infos as s')
            ->join('users as u', 'u.id', '=', 's.user_id')
            ->where('u.id', $id)
            ->select('u.email', 'u.name', 's.*')
            ->get()
            ->first();

            $userInfo['parent'][0] = DB::table('users_parent_infos as s')
            ->join('users as u', 'u.id', '=', 's.user_id')
            ->where('u.id', $userInfo['base']->parent_1_id)
            ->select('u.email', 'u.name as account', 's.*')
            ->get()
            ->first();

            $userInfo['parent'][1] = DB::table('users_parent_infos as s')
            ->join('users as u', 'u.id', '=', 's.user_id')
            ->where('u.id', $userInfo['base']->parent_2_id)
            ->select('u.email', 'u.name as account', 's.*')
            ->get()
            ->first();
        }

        return view('dashboard.admin.userEditForm', compact('user', 'roles', 'userInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userRole = $request->input('menuroles');
        if($userRole === 'mywayAdmin' || $userRole === 'schoolAdmin' || $userRole === 'principal'){
            $validatedData = $request->validate([
                'name'       => 'required|min:1|max:256',
                'email'      => 'required|email|max:256'
            ]);
            
            $user = User::find($id);

            if($request->input('password')){
                $validatedData = $request->validate([
                    'password' => 'required|string|confirmed|min:6'
                ]);
                
                $user->password = Hash::make($request->input('password'));
            }

            $user->name       = $request->input('name');
            $user->email      = $request->input('email');
            $user->updated_at  = date('Y-m-d H:i:s');
            $user->save();

            $request->session()->flash('message', '成功修改使用者');
        }

        if($userRole === 'teacher' || $userRole === 'assistant'){
            $validatedData = $request->validate([
                'name'       => 'required|min:1|max:256',
                'email'      => 'required|email|max:256',
                'chinese_name' => 'required|string|max:100',
                'english_name' => 'required|string|max:100',
                'telephone' => 'required|numeric'
            ]);
            
            $user = User::find($id);

            if($request->input('password')){
                $validatedData = $request->validate([
                    'password' => 'required|string|confirmed|min:6'
                ]);
                
                $user->password = Hash::make($request->input('password'));
            }

            $user->name       = $request->input('name');
            $user->email      = $request->input('email');
            $user->updated_at  = date('Y-m-d H:i:s');
            $user->save();

            //更新教師
            $teacher_data = [
                'chinese_name' => $request->chinese_name,
                'english_name' => $request->english_name,
                'line' => $request->line,
                'telephone' => $request->telephone,
                'address' => $request->address,
                'update_at' => date('Y-m-d H:i:s')
            ];

            DB::table('users_teacher_infos')
            ->where('id', $request->teacher_id)
            ->update($teacher_data);

            $request->session()->flash('message', '成功修改使用者');
        }

        if($userRole === 'parent'){
            $validatedData = $request->validate([
                'name'       => 'required|min:1|max:256',
                'email'      => 'required|email|max:256',
                'line'       => 'required|string|max:100',
                'telephone'  => 'required|numeric'
            ]);
            
            $user = User::find($id);

            if($request->input('password')){
                $validatedData = $request->validate([
                    'password' => 'required|string|confirmed|min:6'
                ]);
                
                $user->password = Hash::make($request->input('password'));
            }

            $user->email      = $request->input('email');
            $user->updated_at  = date('Y-m-d H:i:s');
            $user->save();

            //更新家長
            $teacher_data = [
                'name' => $request->name,
                'line' => $request->line,
                'telephone' => $request->telephone,
                'email' => $request->name,
                'update_at' => date('Y-m-d H:i:s')
            ];

            DB::table('users_parent_infos')
            ->where('id', $request->parent_id)
            ->update($teacher_data);

            $request->session()->flash('message', '成功修改使用者');
        }

        if($userRole === 'student'){
            $validatedData = $request->validate([
                'parent_a_name' => 'required|string|max:100',
                'parent_a_email' => 'required|string|email|max:100',
                'parent_a_line' => 'required|string|max:100',
                'parent_b_name' => 'required|string|max:100',
                'parent_b_email' => 'required|string|email|max:100',
                'parent_b_line' => 'required|string|max:100',
                'chinese_name' => 'required|string|max:100',
                'english_name' => 'required|string|max:100',
                'email' => 'required|string|email|max:100',
                'line' => 'required|string|max:100',
                'start_date' => 'required',
                'expire_date' => 'required',
                'other' => 'required|string|max:100',
            ]);

            if($request->password){
                $validatedData = $request->validate([
                    'password' => 'required|string|min:6',
                ]);
            }

            if($request->parent_a_password){
                $validatedData = $request->validate([
                    'parent_a_password' => 'required|string|min:6',
                ]);
            }
    
            if($request->parent_b_password){
                $validatedData = $request->validate([
                    'parent_b_password' => 'required|string|min:6',
                ]);
            }

            try {
                DB::beginTransaction();
                
                //更新父母Ａ資料
                $parent_a_data['email'] = $request->parent_a_email;
    
                if($request->parent_a_password){
                    $parent_a_data['password'] = Hash::make($request->parent_a_password);
                }
    
                DB::table('users')
                ->where('id', $request->parent_a_user_id)
                ->update($parent_a_data);
    
                $parent_a_data['name'] = $request->parent_a_name;
                $parent_a_data['line'] = $request->parent_a_line;
                $parent_a_data['telephone'] = $request->parent_a_telephone;
    
                DB::table('users_parent_infos')
                ->where('id', $request->parent_a_id)
                ->update($parent_a_data);
    
                //更新父母B資料
                $parent_b_data['email'] = $request->parent_b_email;
    
                if($request->parent_b_password){
                    $parent_b_data['password'] = Hash::make($request->parent_b_password);
                }
    
                DB::table('users')
                ->where('id', $request->parent_b_user_id)
                ->update($parent_b_data);
    
                $parent_b_data['name'] = $request->parent_b_name;
                $parent_b_data['line'] = $request->parent_b_line;
                $parent_b_data['telephone'] = $request->parent_b_telephone;
    
                DB::table('users_parent_infos')
                ->where('id', $request->parent_b_id)
                ->update($parent_b_data);
    
                //更新學生
                $student_data = [
                    'chinese_name' => $request->chinese_name,
                    'english_name' => $request->english_name,
                    'line' => $request->line,
                    'other' => $request->other,
                    'start_date' => $request->start_date,
                    'expire_date' => $request->expire_date,
                ];
    
                $studentAccount = [];
                $studentAccount['email'] = $request->email;
    
                if($request->password){
                    $studentAccount['password'] = Hash::make($request->password);
                }
    
                DB::table('users')
                ->where('id', $request->student_user_id)
                ->update($studentAccount);
    
                DB::table('users_student_infos')
                ->where('id', $request->student_id)
                ->update($student_data);
    
                DB::commit();
                $request->session()->flash('message', '成功修改使用者');
                
            } catch(\Exception $e) {
                DB::rollBack();
            }
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
        }
        return redirect()->route('users.index');
    }
}
