<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Topics;
use App\Models\FirstCategory;
use App\Models\SecondCategory;
use App\Models\ThirdCategory;
use App\Models\TopicTypes;

class TopicsController extends Controller
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
        $topics = DB::table('myway_topics')
            ->join('myway_first_category', 'myway_first_category.id', '=', 'myway_topics.first_cat_id')
            ->select('myway_topics.*', 'myway_first_category.name as first_cat_name')
            ->orderBy('alias', 'ASC')
            ->paginate(20);
        return view('dashboard.topics.topicList', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topicTypes = TopicTypes::all();

        $first_categories = DB::table('myway_first_category')
                    ->get()
                    ->toArray();
        foreach($first_categories as $key => $value){
            $second_categories = DB::table('myway_second_category')
                                    ->where('first_cat_id', $value->id)
                                    ->get()
                                    ->toArray();
            $first_categories[$key]->second_categories = $second_categories;
            foreach($second_categories as $key2 => $value2){
                $third_categories = DB::table('myway_third_category')
                                        ->where('first_cat_id', $value->id)
                                        ->where('second_cat_id', $value2->id)
                                        ->get()
                                        ->toArray();
                $first_categories[$key]->second_categories[$key2]->third_categories = $third_categories;
            }
        }
        return view('dashboard.topics.topicCreate', compact('topicTypes', 'first_categories'));
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
            'first_cat_id' => 'required',
            'contents' => 'required',
        ]);

        try {
            DB::beginTransaction();
            
            $category = new Topics();
            $category->first_cat_id = $request->input('first_cat_id');
            $category->second_cat_id = $request->input('second_cat_id');
            $category->third_cat_id = $request->input('third_cat_id');
            $category->name         = $request->input('name');
            $category->alias        = $request->input('alias');
            $category->contents        = $request->input('contents');
            $category->status       = 1;
            $category->created_at   = date('Y-m-d H:i:s');
            $category->updated_at   = date('Y-m-d H:i:s');
            $category->save();

            DB::commit();

        } catch(\Exception $e) {
            DB::rollBack();
        }

        $request->session()->flash('message', '成功新增');

        return redirect()->route('topics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = DB::table('myway_second_category as second_cat')
            ->join('myway_first_category as first_cat', 'first_cat.id', '=', 'second_cat.first_cat_id')
            ->select('second_cat.*', 'first_cat.name as first_cat_name', 'first_cat.alias as first_cat_alias')
            ->where('second_cat.id', $id)
            ->get()
            ->first();

        return view('dashboard.categories.secondCategoryShow', compact( 'category' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $first_categories = FirstCategory::all();

        $category = DB::table('myway_second_category as second_cat')
            ->join('myway_first_category as first_cat', 'first_cat.id', '=', 'second_cat.first_cat_id')
            ->select('second_cat.*', 'first_cat.alias as first_cat_alias')
            ->where('second_cat.id', $id)
            ->get()
            ->first();

        return view('dashboard.categories.secondCategoryEditForm', compact('category', 'first_categories'));
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
            'alias' => 'required|string|unique:myway_second_category,alias',
            'first_cat_id' =>'required'
        ]);

        $category = SecondCategory::find($id);
        try {
            DB::beginTransaction();
    
            $category->first_cat_id = $request->input('first_cat_id');
            $category->name         = $request->input('name');
            $category->alias        = $request->input('alias');
            $category->description = $request->input('description');
            $category->updated_at  = date('Y-m-d H:i:s');
            $category->save();

            DB::commit();
            $request->session()->flash('message', '成功修改');
            
        } catch(\Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('secondCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = SecondCategory::find($id);

        if($category){
            $category->delete();
        }
        return redirect()->route('secondCategory.index');
    }
}