<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassPrice;
use App\Models\ClassInfo;

class ClassPriceController extends Controller
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
        $classes = DB::table('class_price')
            ->join('class_infos', 'class_price.class_id', '=', 'class_infos.id')
            ->join('schools_branch_info', 'class_infos.branch_school_id', '=', 'schools_branch_info.id')
            ->join('myway_first_category', 'class_infos.teaching_material_1', '=', 'myway_first_category.id')
            ->select('class_infos.period_start_date', 'class_infos.name as class_name', 
                     'schools_branch_info.name as school_name', 'myway_first_category.name as material', 'class_price.*')
            ->get()
            ->toArray();

// dd($schools);
        return view('dashboard.class.classPriceList', compact('classes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = DB::table('class_price')
            ->join('class_infos', 'class_price.class_id', '=', 'class_infos.id')
            ->join('schools_branch_info', 'class_infos.branch_school_id', '=', 'schools_branch_info.id')
            ->join('myway_first_category', 'class_infos.teaching_material_1', '=', 'myway_first_category.id')
            ->select('class_infos.period_start_date', 'class_infos.name as class_name', 
                     'schools_branch_info.name as school_name', 'myway_first_category.name as material', 'class_price.*')
            ->where('class_price.id', $id)
            ->get()
            ->first();
        
// print_r($class);exit;
        return view('dashboard.class.classPriceShow', compact( 'class' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = DB::table('class_price')
            ->join('class_infos', 'class_price.class_id', '=', 'class_infos.id')
            ->join('schools_branch_info', 'class_infos.branch_school_id', '=', 'schools_branch_info.id')
            ->join('myway_first_category', 'class_infos.teaching_material_1', '=', 'myway_first_category.id')
            ->select('class_infos.period_start_date', 'class_infos.name as class_name', 
                     'schools_branch_info.name as school_name', 'myway_first_category.name as material', 'class_price.*')
            ->where('class_price.id', $id)
            ->get()
            ->first();

// dd($school);
        return view('dashboard.class.classPriceEditForm', compact('class'));
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
        //     'period_end_date' => 'required',
        //     'pay_start_date'  => 'required',
        //     'pay_end_date'    => 'required',
            'price'           => 'required|int'
        ]);

        $class = ClassPrice::find($id);

        try {
            DB::beginTransaction();

            //更新班級資料
            $class->period_end_date   = $request->input('period_end_date');
            $class->pay_start_date    = $request->input('pay_start_date');
            $class->pay_end_date      = $request->input('pay_end_date');
            $class->price             = $request->input('price');
            $class->status            = 1;
            $class->updated_at        = date('Y-m-d H:i:s');
            $class->save();

            DB::commit();
            $request->session()->flash('message', '成功修改');

        } catch(\Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('classPrice.index');
    }
}
