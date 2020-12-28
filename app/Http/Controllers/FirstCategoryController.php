<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\FirstCategory;

class FirstCategoryController extends Controller
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
        $categories = FirstCategory::paginate( 20 );

        return view('dashboard.categories.firstCategoryList', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.firstCategoryCreate');
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
            'name' => 'required|string|between:2,100'
        ]);

        try {
            DB::beginTransaction();
            
            $category = new FirstCategory();
            $category->name         = $request->input('name');
            $category->description  = $request->input('description');
            $category->status       = 1;
            $category->created_at   = date('Y-m-d H:i:s');
            $category->updated_at   = date('Y-m-d H:i:s');
            $category->save();

            DB::commit();

        } catch(\Exception $e) {
            DB::rollBack();
        }

        $request->session()->flash('message', '成功新增');

        return redirect()->route('firstCategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = DB::table('myway_first_category')
            ->where('id', $id)
            ->get()
            ->first();

        return view('dashboard.categories.firstCategoryShow', compact( 'category' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DB::table('myway_first_category')
            ->where('id', $id)
            ->get()
            ->first();

        return view('dashboard.categories.firstCategoryEditForm', compact('category'));
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
            'name' => 'required|string|between:2,100'
        ]);

        $category = FirstCategory::find($id);
        try {
            DB::beginTransaction();
    
            $category->name        = $request->input('name');
            $category->description = $request->input('description');
            $category->updated_at  = date('Y-m-d H:i:s');
            $category->save();

            DB::commit();
            $request->session()->flash('message', '成功修改');
            
        } catch(\Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('firstCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = FirstCategory::find($id);

        if($category){
            $category->delete();
        }
        return redirect()->route('firstCategory.index');
    }
}
