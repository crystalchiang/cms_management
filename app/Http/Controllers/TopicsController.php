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
            
            $topic = new Topics();
            $topic->first_cat_id = $request->input('first_cat_id');
            $topic->second_cat_id = $request->input('second_cat_id');
            $topic->third_cat_id = $request->input('third_cat_id');
            $topic->name         = $request->input('name');
            $topic->alias        = $request->input('alias');
            $topic->contents        = $request->input('contents');
            $topic->status       = 1;
            $topic->created_at   = date('Y-m-d H:i:s');
            $topic->updated_at   = date('Y-m-d H:i:s');
            $topic->save();

            DB::commit();

        } catch(\Exception $e) {
            DB::rollBack();
        }

        $request->session()->flash('message', '成功新增');

        return redirect()->route('topics.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topicTypes = TopicTypes::all();
        $topic = Topics::find($id);

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

        return view('dashboard.topics.topicEditForm', compact('topicTypes','first_categories','topic'));
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
            'first_cat_id' => 'required',
            'contents' => 'required',
        ]);
            // print_r($request->input('second_cat_id'));
        try {
            DB::beginTransaction();
            
            $topic = Topics::find($id);
            $topic->first_cat_id = $request->input('first_cat_id');
            $topic->second_cat_id = $request->input('second_cat_id');
            $topic->third_cat_id = $request->input('third_cat_id');
            $topic->name         = $request->input('name');
            $topic->alias        = $request->input('alias');
            $topic->contents        = $request->input('contents');
            $topic->updated_at   = date('Y-m-d H:i:s');
            $topic->save();

            DB::commit();

        } catch(\Exception $e) {
            DB::rollBack();
        }

        $request->session()->flash('message', '成功修改');

        return redirect()->route('topics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = Topics::find($id);

        if($topic){
            $topic->delete();
        }
        return redirect()->route('topics.index');
    }
}