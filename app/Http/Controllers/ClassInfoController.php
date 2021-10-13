<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;
use App\Models\ClassInfo;

class ClassInfoController extends Controller
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
        $classes = DB::table('class_infos')
            ->join('schools_branch_info', 'schools_branch_info.id', '=', 'class_infos.branch_school_id')
            ->select('schools_branch_info.name as school_name', 'class_infos.*')
            ->get()
            ->toArray();
        
        foreach($classes as $key => $item){
            $teacher = DB::table('users')->where('users.id', $item->teacher_id)->value('name');
            $assistant = DB::table('users')->where('users.id', $item->assistant_id)->value('name');
            $supply_teacher = DB::table('users')->where('users.id', $item->supply_teacher_id)->value('name');
            $material_1 = DB::table('myway_first_category')->where('myway_first_category.id', $item->teaching_material_1)->value('name');
            $material_2 = DB::table('myway_first_category')->where('myway_first_category.id', $item->teaching_material_2)->value('name');
            $material_3 = DB::table('myway_first_category')->where('myway_first_category.id', $item->teaching_material_3)->value('name');
            $material_4 = DB::table('myway_first_category')->where('myway_first_category.id', $item->teaching_material_4)->value('name');
            $class_day = json_decode($item->class_day);
            
            $classes[$key]->teacher = $teacher;
            $classes[$key]->assistant = $assistant;
            $classes[$key]->supply_teacher = $supply_teacher;
            $classes[$key]->material_1 = $material_1;
            $classes[$key]->material_2 = $material_2;
            $classes[$key]->material_3 = $material_3;
            $classes[$key]->material_4 = $material_4;
            $classes[$key]->class_day_text = '';
            if($class_day){
                foreach($class_day as $value){
                    $text = array('零', '一', '二', '三', '四', '五', '六', '日');
                    $classes[$key]->class_day_text .= $text[$value] . " ";
                }
            }else{
                $classes[$key]->class_day_text = '';
            }
            
            $s_text = array('上午', '下午', '晚上');
            $classes[$key]->class_schedule_name = $s_text[$item->class_schedule];
        }

// dd($schools);
        return view('dashboard.class.classList', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branch_schools = DB::table('schools_branch_info')
                    ->get()
                    ->toArray();

        // 以下尚未篩選學校旗下的老師功能
        $teachers = DB::table('users')
                    ->where('menuroles', 'teacher')
                    ->get()
                    ->toArray();
        $assistants = DB::table('users')
                    ->where('menuroles', 'assistant')
                    ->get()
                    ->toArray();
        $supplyTeachers = DB::table('users')
                    ->where('menuroles', 'supplyTeacher')
                    ->get()
                    ->toArray();
        $material = DB::table('myway_first_category')
                    ->get()
                    ->toArray();
            

        $varibles = [ 
            'branch_schools' => $branch_schools, 
            'teachers' => $teachers, 
            'assistants' => $assistants,
            'supplyTeachers' => $supplyTeachers,
            'material' => $material,
            'class_schedule' => ['上午','下午','晚上']
        ];
        return view('dashboard.class.classCreate', $varibles);
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
            'branch_school_id' => 'required',
            'name' => 'required|string|between:2,100',
            'teacher_id' => 'required',
            'teaching_material_1' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $classID = DB::table('class_infos')->insertGetId([
                'branch_school_id' => $request->input('branch_school_id'),
                'name' => $request->input('name'),
                'teacher_id' => $request->input('teacher_id'),
                'assistant_id' => $request->input('assistant_id'),
                'supply_teacher_id' => $request->input('supply_teacher_id'),
                'teaching_material_1' => $request->input('teaching_material_1'),
                'teaching_material_2' => $request->input('teaching_material_2'),
                'teaching_material_3' => $request->input('teaching_material_3'),
                'teaching_material_4' => $request->input('teaching_material_4'),
                'period_start_date' => $request->input('period_start_date'),
                // 'period_end_date' => $request->input('period_end_date'),
                'class_day' => json_encode($request->input('class_day')),
                'class_schedule' => $request->input('class_schedule'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => 1,
            ]);

            DB::table('class_price')->insert([
                'class_id' => $classID,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => 1,
            ]);

            DB::commit();

        } catch(\Exception $e) {
            DB::rollBack();
        }

        $request->session()->flash('message', '成功新增');

        return redirect()->route('classInfo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = DB::table('class_infos')
            ->join('schools_branch_info', 'schools_branch_info.id', '=', 'class_infos.branch_school_id')
            ->select('schools_branch_info.name as school_name', 'class_infos.*')
            ->where('class_infos.id', $id)
            ->get()
            ->first();
        
        $teacher = DB::table('users')->where('users.id', $class->teacher_id)->value('name');
        $assistant = DB::table('users')->where('users.id', $class->assistant_id)->value('name');
        $supply_teacher = DB::table('users')->where('users.id', $class->supply_teacher_id)->value('name');
        $material_1 = DB::table('myway_first_category')->where('myway_first_category.id', $class->teaching_material_1)->value('name');
        $material_2 = DB::table('myway_first_category')->where('myway_first_category.id', $class->teaching_material_2)->value('name');
        $material_3 = DB::table('myway_first_category')->where('myway_first_category.id', $class->teaching_material_3)->value('name');
        $material_4 = DB::table('myway_first_category')->where('myway_first_category.id', $class->teaching_material_4)->value('name');
        $class_day = json_decode($class->class_day);
        
        $class->teacher = $teacher;
        $class->assistant = $assistant;
        $class->supply_teacher = $supply_teacher;
        $class->material_1 = $material_1;
        $class->material_2 = $material_2;
        $class->material_3 = $material_3;
        $class->material_4 = $material_4;
        $class->class_day_text = '';
        foreach($class_day as $value){
            $text = array('零', '一', '二', '三', '四', '五', '六', '日');
            $class->class_day_text .= $text[$value] . " ";
        }
        $s_text = array('上午', '下午', '晚上');
        $class->class_schedule_name = $s_text[$class->class_schedule];
        
// print_r($class);exit;
        return view('dashboard.class.classShow', compact( 'class' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = DB::table('class_infos')
            ->select('class_infos.*')
            ->where('class_infos.id', $id)
            ->get()
            ->first();

        $class->class_day = json_decode($class->class_day);

        $branch_schools = DB::table('schools_branch_info')
                    ->get()
                    ->toArray();

        // 以下尚未篩選學校旗下的老師功能
        $teachers = DB::table('users')
                    ->where('menuroles', 'teacher')
                    ->get()
                    ->toArray();
        $assistants = DB::table('users')
                    ->where('menuroles', 'assistant')
                    ->get()
                    ->toArray();
        $supplyTeachers = DB::table('users')
                    ->where('menuroles', 'supplyTeacher')
                    ->get()
                    ->toArray();
        $material = DB::table('myway_first_category')
                    ->get()
                    ->toArray();
// print_r($test);exit;
        $class_schedule = ['上午','下午','晚上'];
// dd($school);
        return view('dashboard.class.classEditForm', compact('class', 'branch_schools', 'teachers', 'assistants', 'supplyTeachers', 'material', 'class_schedule'));
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
            'branch_school_id' => 'required',
            'name' => 'required|string|between:2,100',
            'teacher_id' => 'required',
            'teaching_material_1' => 'required',
        ]);

        $class = ClassInfo::find($id);

        try {
            DB::beginTransaction();

            //更新班級資料
            $class->name                = $request->input('name');
            $class->branch_school_id    = $request->input('branch_school_id');
            $class->teacher_id          = $request->input('teacher_id');
            $class->assistant_id        = $request->input('assistant_id');
            $class->supply_teacher_id   = $request->input('supply_teacher_id');
            $class->teaching_material_1 = $request->input('teaching_material_1');
            $class->teaching_material_2 = $request->input('teaching_material_2');
            $class->teaching_material_3 = $request->input('teaching_material_3');
            $class->teaching_material_4 = $request->input('teaching_material_4');
            $class->period_start_date   = $request->input('period_start_date');
            // $class->period_end_date     = $request->input('period_end_date');
            $class->class_day           = json_encode($request->input('class_day'));
            $class->class_schedule      = $request->input('class_schedule');
            $class->status              = 1;
            $class->updated_at  = date('Y-m-d H:i:s');
            $class->save();

            DB::commit();
            $request->session()->flash('message', '成功修改');

        } catch(\Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('classInfo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $class = ClassInfo::find($id);

        if($class){
            $class->delete();
        }

        $request->session()->flash('message', '成功刪除');

        return redirect()->route('classInfo.index');
    }
}
