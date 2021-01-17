<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Topics;
use App\Models\TopicTypes;
use App\Models\TopicLevels;

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
            ->join('myway_topic_levels', 'myway_topic_levels.id', '=', 'myway_topics.level_id')
            ->join('myway_topic_types', 'myway_topic_types.id', '=', 'myway_topics.type_id')
            ->select('myway_topics.*', 'myway_topic_levels.name as level_name', 'myway_topic_types.name as type_name')
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
        $topicLevels = TopicLevels::all();
        return view('dashboard.topics.topicCreate', compact('topicLevels','topicTypes'));
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
            'alias' => 'required|string|unique:myway_second_category,alias',
            'first_cat_id' =>'required'
        ]);

        try {
            DB::beginTransaction();
            
            $category = new SecondCategory();
            $category->first_cat_id = $request->input('first_cat_id');
            $category->name         = $request->input('name');
            $category->alias        = $request->input('alias');
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

        return redirect()->route('secondCategory.index');
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