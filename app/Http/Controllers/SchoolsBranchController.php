<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;
use App\Models\SchoolBranch;
use Log;

class SchoolsBranchController extends Controller
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
    public function index(Request $request)
    {
        $id = $request->input('id') ? $request->input('id') : null;
        $query = DB::table('schools_branch_info')
            ->join('schools_main_info', 'schools_branch_info.main_school_id', '=', 'schools_main_info.id')
            ->join('school_category', 'schools_main_info.category_id', '=', 'school_category.id')
            ->join('users', 'schools_branch_info.principal_id', '=', 'users.id')
            ->select('school_category.name as category_name', 'schools_branch_info.*','schools_main_info.name as main_name', 
            'users.name as principal_name');

        if(isset($id) && !empty($id)){
            $query->where('schools_branch_info.main_school_id', $id);
        }
        $schools = $query->paginate(15);
        $isSelectMain = $id;

        foreach($schools as $key => $value){
            $id = $value->id;
            $schools[$key]->class_total = DB::table('class_infos')->where('branch_school_id', $id)->count();
            $schools[$key]->teachers_total = DB::table('users')
                                                ->join('class_infos', 'class_infos.teacher_id', '=', 'users.id')
                                                ->join('schools_branch_info', 'schools_branch_info.id', '=', 'class_infos.branch_school_id')
                                                ->where('schools_branch_info.id', $id)
                                                ->where('users.menuroles', 'teacher')
                                                ->groupBy('class_infos.teacher_id')
                                                ->count();
            $schools[$key]->assistant_total = DB::table('users')
                                                ->join('class_infos', 'class_infos.assistant_id', '=', 'users.id')
                                                ->join('schools_branch_info', 'schools_branch_info.id', '=', 'class_infos.branch_school_id')
                                                ->where('schools_branch_info.id', $id)
                                                ->where('users.menuroles', 'assistant')
                                                ->groupBy('class_infos.teacher_id')
                                                ->count();
            $schools[$key]->students_total = DB::table('users_student_infos')
                                                ->join('class_infos', 'class_infos.id', '=', 'users_student_infos.class_id')
                                                ->join('schools_branch_info', 'schools_branch_info.id', '=', 'class_infos.branch_school_id')
                                                ->where('schools_branch_info.id', $id)
                                                ->count();
        }

// dd($schools);
        return view('dashboard.school.schoolBranchList', compact('schools', 'isSelectMain'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mainSchools = DB::table('schools_main_info')
                        ->get()
                        ->toArray();

        return view('dashboard.school.schoolBranchCreate', [ 'mainSchools' => $mainSchools ]);
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
            'main_school_id' => 'required',
            'name' => 'required|string|between:2,100',
            'alias' => 'required|string|between:2,100',
            'telephone' => 'required',
            'city' => 'required|string|between:2,100',
            'area' => 'required|string|between:2,100',
            'address' => 'required|string|between:2,100',
            'principal_name' => 'required|string|between:2,100',
            'principal_telephone' => 'required',
            'principal_email' => 'required|string|email|max:100|unique:users,email',
            'principal_password' => 'required|string|confirmed|min:6'
        ]);

        try {
            DB::beginTransaction();
            
            $user = new User();
            $user->name     = $request->input('principal_name');
            $user->password     = Hash::make($request->input('principal_password'));
            $user->email     = $request->input('principal_email');
            $user->menuroles   = $request->input('menuroles');
            $user->telephone   = $request->input('principal_telephone');
            $user->line   = $request->input('principal_line') ? $request->input('principal_line'): '';
            $user->status = 1;
            $user->created_at = date('Y-m-d H:i:s');
            $user->save();
            $principal_id = $user->id;

            $school = DB::table('schools_branch_info')->insert([
                'main_school_id' => $request->input('main_school_id'),
                'name' => $request->input('name'),
                'alias' => $request->input('alias'),
                'code' => '2' . $this->getRandomCode(10),
                'telephone' => $request->input('telephone'),
                'city' => $request->input('city'),
                'area' => $request->input('area'),
                'address' => $request->input('address'),
                'principal_id' => $principal_id,
                'created_at' => date('Y-m-d H:i:s'),
                'expired_at' => $request->input('expired_at'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => 1
            ]);

            DB::commit();

        } catch(\Exception $e) {
            DB::rollBack();
        }

        $request->session()->flash('message', '成功新增');

        return redirect()->route('schoolsBranch.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = DB::table('schools_branch_info')
            ->join('schools_main_info', 'schools_branch_info.main_school_id', '=', 'schools_main_info.id')
            ->join('school_category', 'schools_main_info.category_id', '=', 'school_category.id')
            ->join('users', 'schools_branch_info.principal_id', '=', 'users.id')
            ->select('school_category.name as category_name', 'schools_branch_info.*','schools_main_info.name as main_name', 
            'users.name as p_name', 'users.telephone as p_telephone', 'users.email as p_email', 'users.line as p_line')
            ->where('schools_branch_info.id', $id)
            ->get()
            ->first();
            
        return view('dashboard.school.schoolBranchShow', compact( 'school' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = DB::table('schools_branch_info')
            ->join('schools_main_info', 'schools_branch_info.main_school_id', '=', 'schools_main_info.id')
            ->join('school_category', 'schools_main_info.category_id', '=', 'school_category.id')
            ->join('users', 'schools_branch_info.principal_id', '=', 'users.id')
            ->select('school_category.name as category_name', 'schools_branch_info.*','schools_main_info.name as main_name', 
            'users.name as p_name', 'users.telephone as p_telephone', 'users.email as p_email', 'users.line as p_line')
            ->where('schools_branch_info.id', $id)
            ->get()
            ->first();


        $mainSchools = DB::table('schools_main_info')
            ->get()
            ->toArray();
// dd($school);
        return view('dashboard.school.schoolBranchEditForm', compact('school', 'mainSchools'));
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

        $validatedData = $request->validate([
            'main_school_id' => 'required',
            'name' => 'required|string|between:2,100',
            'alias' => 'required|string|between:2,100',
            'telephone' => 'required',
            'city' => 'required|string|between:2,100',
            'area' => 'required|string|between:2,100',
            'address' => 'required|string|between:2,100',
            'principal_name' => 'required|string|between:2,100',
            'principal_telephone' => 'required',
            'principal_email' => 'required|string|email|max:100'
        ]);
        
        $school = School::find($id);
        $user = User::find($request->input('principal_id'));
    
        try {
            DB::beginTransaction();
            
            //更新校長資料
            if($request->input('principal_password')){
                $validatedData = $request->validate([
                    'principal_password' => 'required|string|confirmed|min:6'
                ]);
                
                $user->password = Hash::make($request->input('principal_password'));
            }
    
            $user->name       = $request->input('principal_name');
            $user->email      = $request->input('principal_email');
            $user->line      = $request->input('principal_line')?$request->input('principal_line'):'';
            $user->telephone      = $request->input('principal_telephone');
            $user->updated_at  = date('Y-m-d H:i:s');
            $user->save();

            //更新分校資料
            $school->name       = $request->input('name');
            $school->alias       = $request->input('alias');
            $school->code      = $request->input('code');
            $school->telephone      = $request->input('telephone');
            $school->city      = $request->input('city');
            $school->area      = $request->input('area');
            $school->address      = $request->input('address');
            $school->expired_at      = $request->input('expired_at');
            $school->updated_at  = date('Y-m-d H:i:s');
            $school->save();
                
            DB::commit();
            $request->session()->flash('message', '成功修改分校');
            
        } catch(\Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('schoolsBranch.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school = School::find($id);
        $user = User::find($school->principal_id);

        if($school && $school->principal_id){
            $school->delete();
            $user->delete();
        }
        return redirect()->route('schoolsBranch.index');
    }

    public function getRandomCode($qty)
    {
        //Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
        $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
        $QuantidadeCaracteres = strlen($Caracteres);
        $QuantidadeCaracteres--;

        $Hash = NULL;
            for($x=1; $x <= $qty; $x++){
                $Posicao = rand(0, $QuantidadeCaracteres);
                $Hash .= substr($Caracteres, $Posicao, 1);
            }

        return $Hash;
    }
}
