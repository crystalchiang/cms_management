<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OtherService;

class OtherServiceController extends Controller
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
        $services = DB::table('other_service')
            ->select('*')
            ->get()
            ->toArray();

        $varibles = [ 
            'services' => $services, 
            'levels' => ['初級', '中級', '中高級', '高級'],
            'types'  => ['以逐題收費', '以逐篇收費', '上傳', '小時制', '次']
        ];
// dd($schools);
        return view('dashboard.service.otherServiceList', $varibles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = DB::table('myway_topics')
                    ->get()
                    ->toArray();

        $varibles = [ 
            'topics' => $topics, 
            'levels' => ['初級', '中級', '中高級', '高級'],
            'types'  => ['題', '篇', '上傳', '小時制', '次']
        ];
        return view('dashboard.service.otherServiceCreate', $varibles);
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
            'name'        => 'required',
            'description' => 'required|string|between:2,512',
            'type'        => 'required',
            'level'       => 'required',
            'remark'      => 'string',
            'price'       => 'int'
        ]);

        try {
            DB::beginTransaction();

            DB::table('other_service')->insert([
                'name'        => $request->input('name'),
                'description' => $request->input('description'),
                'type'        => $request->input('type'),
                'level'       => $request->input('level'),
                'topic_id'    => $request->input('topic_id'),
                'price'       => $request->input('price'),
                'remark'      => $request->input('remark'),
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'status'      => 1,
            ]);

            DB::commit();

        } catch(\Exception $e) {
            DB::rollBack();
        }

        $request->session()->flash('message', '成功新增');

        return redirect()->route('otherService.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = DB::table('other_service')
            ->leftJoin('myway_topics', 'myway_topics.id', '=', 'other_service.topic_id')
            ->select('other_service.*', 'myway_topics.alias')
            ->where('other_service.id', $id)
            ->get()
            ->first();

        $varibles = [ 
            'service' => $service, 
            'levels' => ['初級', '中級', '中高級', '高級'],
            'types'  => ['以逐題收費', '以逐篇收費', '上傳', '小時制', '次']
        ];
        
        return view('dashboard.service.otherServiceShow', $varibles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topics = DB::table('myway_topics')
                    ->get()
                    ->toArray();

        $service = DB::table('other_service')
            ->leftJoin('myway_topics', 'myway_topics.id', '=', 'other_service.topic_id')
            ->select('other_service.*', 'myway_topics.alias')
            ->where('other_service.id', $id)
            ->get()
            ->first();

        $varibles = [ 
            'service' => $service, 
            'levels'  => ['初級', '中級', '中高級', '高級'],
            'types'   => ['以逐題收費', '以逐篇收費', '上傳', '小時制', '次'],
            'topics'  => $topics
        ];

// dd($school);
        return view('dashboard.service.otherServiceEditForm', $varibles);
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
            'name'        => 'required',
            'description' => 'required|string|between:2,512',
            'type'        => 'required',
            'level'       => 'required',
            'remark'      => 'string',
            'price'       => 'int'
        ]);

        $service = OtherService::find($id);

        try {
            DB::beginTransaction();

            //更新班級資料
            $service->name          = $request->input('name');
            $service->description   = $request->input('description');
            $service->type          = $request->input('type');
            $service->level         = $request->input('level');
            $service->topic_id      = $request->input('type') <= 1 ? $request->input('topic_id') : null;
            $service->price         = $request->input('type') != 2 ? $request->input('price') : null;
            $service->remark        = $request->input('remark');
            $service->status        = 1;
            $service->updated_at    = date('Y-m-d H:i:s');
            $service->save();

            DB::commit();
            $request->session()->flash('message', '成功修改');

        } catch(\Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('otherService.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = OtherService::find($id);
        if($service){
            $service->delete();
        }
        return redirect()->route('otherService.index');
    }
}
