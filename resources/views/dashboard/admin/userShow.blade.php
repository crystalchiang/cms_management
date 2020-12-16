@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-header">
                      <h4><i class="fa fa-align-justify"></i> 使用者 {{ $user->name }}</h4>
                    </div>
                    <div class="card-body">
                        @if($user->menuroles !== 'parent' && $user->menuroles !== 'student')
                        <h6>使用者名稱: {{ $user->name }}</h6>
                        @endif

                        @if($user->menuroles === 'student')
                        <h6>學生帳號: {{ $user->name }}</h6>
                        @endif

                        @if($user->menuroles === 'parent')
                        <h6>家長帳號: {{ $user->name }}</h6>
                        @endif

                        <h6>電子信箱: {{ $user->email }}</h6>
                        <h6>權限: {{ __('auth.roles.'.$user->menuroles) }}</h6>

                        @if($user->menuroles === 'teacher' || $user->menuroles === 'assistant' || $user->menuroles === 'student')
                        <h6>中文姓名: {{ $userInfo['base']->chinese_name }}</h6>
                        <h6>英文姓名: {{ $userInfo['base']->english_name }}</h6>
                        @endif

                        @if($user->menuroles === 'parent')
                        <h6>姓名: {{ $userInfo['base']->name }}</h6>
                        @endif

                        @if($user->menuroles === 'teacher' || $user->menuroles === 'assistant' || $user->menuroles === 'parent')
                        <h6>電話: {{ $userInfo['base']->telephone }}</h6>
                        <h6>Line: {{ $userInfo['base']->line }}</h6>
                        @endif

                        @if($user->menuroles === 'teacher' || $user->menuroles === 'assistant')
                        <h6>地址: {{ $userInfo['base']->address }}</h6>
                        @endif

                        @if($user->menuroles === 'student')
                        <h6>家長姓名1: {{ $userInfo['parent'][0]->name }}</h6>
                        <h6>家長信箱1: {{ $userInfo['parent'][0]->email }}</h6>
                        <h6>家長帳號1: {{ $userInfo['parent'][0]->account }}</h6>
                        <h6>家長電話1: {{ $userInfo['parent'][0]->telephone }}</h6>
                        <h6>家長Line1: {{ $userInfo['parent'][1]->line }}</h6>
                        <h6>家長姓名2: {{ $userInfo['parent'][1]->name }}</h6>
                        <h6>家長信箱2: {{ $userInfo['parent'][1]->email }}</h6>
                        <h6>家長帳號2: {{ $userInfo['parent'][1]->account }}</h6>
                        <h6>家長電話2: {{ $userInfo['parent'][1]->telephone }}</h6>
                        <h6>家長Line2: {{ $userInfo['parent'][1]->line }}</h6>
                        <h6>入學日: {{ $userInfo['base']->start_date }}</h6>
                        <h6>退學日: {{ $userInfo['base']->expire_date }}</h6>
                        <h6>備註: {{ $userInfo['base']->other }}</h6>
                        @endif

                        <h6>建立日期: {{ $user->created_at }}</h6>
                        <h6>最後更新日期: {{ $user->updated_at }}</h6>
                        <div class="row mt-3">
                          <div class="col-6">
                            <a href="{{ route('users.index') }}" class="btn btn-block btn-primary">{{ __('返回') }}</a> 
                          </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection