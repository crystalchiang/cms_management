<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\SecondCategory;
use App\Models\FirstCategory;
use App\Models\ThirdCategory;

class ThirdCategoryController extends Controller
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
        $categories = DB::table('myway_third_category as third_cat')
            ->join('myway_first_category as first_cat', 'first_cat.id', '=', 'third_cat.first_cat_id')
            ->join('myway_second_category as second_cat', 'second_cat.id', '=', 'third_cat.second_cat_id')
            ->select('third_cat.*', 'first_cat.name as first_cat_name', 'first_cat.alias as first_cat_alias', 'second_cat.name as second_cat_name', 'second_cat.alias as second_cat_alias')
            ->orderBy('alias', 'ASC')
            ->paginate(20);

        return view('dashboard.categories.thirdCategoryList', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $first_categories = DB::table('myway_first_category')
                    ->get()
                    ->toArray();
        foreach($first_categories as $key => $value){
            $second_categories = DB::table('myway_second_category')
                                    ->where('first_cat_id', $value->id)
                                    ->get()
                                    ->toArray();
            $first_categories[$key]->second_categories = $second_categories;
        }

        return view('dashboard.categories.thirdCategoryCreate', compact('first_categories'));
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
            'name' => 'required|string',
            'alias' => 'required|string|unique:myway_third_category,alias',
            'first_cat_id' =>'required',
            'second_cat_id' =>'required'
        ]);

        try {
            DB::beginTransaction();
            
            $category = new ThirdCategory();
            $category->first_cat_id  = $request->input('first_cat_id');
            $category->second_cat_id = $request->input('second_cat_id');
            $category->name          = $request->input('name');
            $category->alias         = $request->input('alias');
            $category->description   = $request->input('description');
            $category->status        = 1;
            $category->created_at    = date('Y-m-d H:i:s');
            $category->updated_at    = date('Y-m-d H:i:s');
            $category->save();

            DB::commit();

        } catch(\Exception $e) {
            DB::rollBack();
        }

        $request->session()->flash('message', '成功新增');

        return redirect()->route('thirdCategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = DB::table('myway_third_category as third_cat')
            ->join('myway_first_category as first_cat', 'first_cat.id', '=', 'third_cat.first_cat_id')
            ->join('myway_second_category as second_cat', 'second_cat.id', '=', 'third_cat.second_cat_id')
            ->select('third_cat.*', 'first_cat.name as first_cat_name', 'first_cat.alias as first_cat_alias', 'second_cat.name as second_cat_name', 'second_cat.alias as second_cat_alias')
            ->where('third_cat.id', $id)
            ->get()
            ->first();

        return view('dashboard.categories.thirdCategoryShow', compact( 'category' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $first_categories = DB::table('myway_first_category')
                    ->get()
                    ->toArray();
        foreach($first_categories as $key => $value){
            $second_categories = DB::table('myway_second_category')
                                    ->where('first_cat_id', $value->id)
                                    ->get()
                                    ->toArray();
            $first_categories[$key]->second_categories = $second_categories;
        }

        $category = DB::table('myway_third_category')
            ->where('id', $id)
            ->get()
            ->first();

        return view('dashboard.categories.thirdCategoryEditForm', compact('category', 'first_categories'));
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
            'name' => 'required|string',
            'alias' => 'required|string|unique:myway_third_category,alias',
            'first_cat_id' =>'required',
            'second_cat_id' =>'required'
        ]);
     
        $category = ThirdCategory::find($id);
        try {
            DB::beginTransaction();
    
            $category->first_cat_id  = $request->input('first_cat_id');
            $category->second_cat_id = $request->input('second_cat_id');
            $category->name          = $request->input('name');
            $category->alias         = $request->input('alias');
            $category->description   = $request->input('description');
            $category->updated_at    = date('Y-m-d H:i:s');
            $category->save();

            DB::commit();
            $request->session()->flash('message', '成功修改');
            
        } catch(\Exception $e) {
            
            DB::rollBack();
        }

        return redirect()->route('thirdCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ThirdCategory::find($id);

        if($category){
            $category->delete();
        }
        return redirect()->route('thirdCategory.index');
    }
}
