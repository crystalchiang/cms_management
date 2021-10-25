<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;

class SchoolsController extends Controller
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
        $schools = DB::table('schools_main_info')
            ->join('school_category', 'schools_main_info.category_id', '=', 'school_category.id')
            ->join('users', 'schools_main_info.principal_id', '=', 'users.id')
            ->select('school_category.name as category_name', 'schools_main_info.*', 
            'users.name as principal_name', 'users.telephone as principal_telephone', 'users.email as principal_email')
            ->get()
            ->toArray();

        foreach($schools as $key => $value){
            $id = $value->id;
            $schools[$key]->branch_schools_total = DB::table('schools_branch_info')->where('id', $id)->count();
            $schools[$key]->teachers_total = DB::table('users')->whereIn('menuroles', ['teacher', 'assistant'])->count();
            $schools[$key]->students_total = DB::table('users_student_infos')
                                                ->join('class_infos', 'class_infos.id', '=', 'users_student_infos.class_id')
                                                ->join('schools_branch_info', 'schools_branch_info.id', '=', 'class_infos.branch_school_id')
                                                ->where('schools_branch_info.main_school_id', $id)
                                                ->count();
        }
        return view('dashboard.school.schoolList', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('school_category')
                    ->get()
                    ->toArray();

        return view('dashboard.school.schoolCreate', [ 'categories' => $categories ]);
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
            'name' => 'required|string|between:2,100',
            'alias' => 'required|string|between:2,100',
            'category_id' => 'required',
            'identity_id' => 'required',
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

            $school = DB::table('schools_main_info')->insert([
                'name' => $request->input('name'),
                'alias' => $request->input('alias'),
                'category_id' => $request->input('category_id'),
                'identity_id' => $request->input('identity_id'),
                'code' => '1' . $this->getRandomCode(10),
                'telephone' => $request->input('telephone'),
                'city' => $request->input('city'),
                'area' => $request->input('area'),
                'address' => $request->input('address'),
                'website' => $request->input('website') ? $request->input('website') : '',
                'principal_id' => $principal_id,
                'created_at' => date('Y-m-d H:i:s'),
                'expired_at' => $request->input('expired_at'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => 1,

            ]);
            DB::commit();

        } catch(\Exception $e) {
            DB::rollBack();
        }

        $request->session()->flash('message', '成功新增');

        return redirect()->route('schools.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = DB::table('schools_main_info')
            ->join('school_category', 'schools_main_info.category_id', '=', 'school_category.id')
            ->join('users', 'schools_main_info.principal_id', '=', 'users.id')
            ->select('school_category.name as category_name', 'schools_main_info.*', 
            'users.name as p_name', 'users.telephone as p_telephone', 'users.email as p_email', 'users.line as p_line')
            ->where('schools_main_info.id', $id)
            ->get()
            ->first();

        return view('dashboard.school.schoolShow', compact( 'school' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = DB::table('schools_main_info')
            ->join('school_category', 'schools_main_info.category_id', '=', 'school_category.id')
            ->join('users', 'schools_main_info.principal_id', '=', 'users.id')
            ->select('schools_main_info.*', 
            'users.name as p_name', 'users.telephone as p_telephone', 'users.email as p_email', 'users.line as p_line')
            ->where('schools_main_info.id', $id)
            ->get()
            ->first();


        $categories = DB::table('school_category')
                    ->get()
                    ->toArray();
// dd($school);
        return view('dashboard.school.schoolEditForm', compact('school', 'categories'));
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
            'name' => 'required|string|between:2,100',
            'alias' => 'required|string|between:2,100',
            'category_id' => 'required',
            'identity_id' => 'required',
            'telephone' => 'required',
            'city' => 'required|string|between:2,100',
            'area' => 'required|string|between:2,100',
            'address' => 'required|string|between:2,100',
            'principal_name' => 'required|string|between:2,100',
            'principal_telephone' => 'required',
            'principal_email' => 'required|string|email|max:100',
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

            //更新總校資料
            $school->name       = $request->input('name');
            $school->alias       = $request->input('alias');
            $school->category_id      = $request->input('category_id');
            $school->identity_id      = $request->input('identity_id');
            $school->telephone      = $request->input('telephone');
            $school->city      = $request->input('city');
            $school->area      = $request->input('area');
            $school->address      = $request->input('address');
            $school->website      = $request->input('website') ? $request->input('website') : '';
            $school->expired_at      = $request->input('expired_at');
            $school->updated_at  = date('Y-m-d H:i:s');
            $school->save();

            DB::commit();
            $request->session()->flash('message', '成功修改總校');
            
        } catch(\Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('schools.index');
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
        return redirect()->route('schools.index');
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
