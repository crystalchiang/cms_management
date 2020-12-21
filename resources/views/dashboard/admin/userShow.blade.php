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
                        <h6>中文姓名: {{ $user->name }}</h6>
                        <h6>英文姓名: {{ $user->english_name }}</h6>

                        <h6>電話: {{ $user->telephone }}</h6>
                        <h6>Line: {{ $user->line }}</h6>
                        <h6>地址: {{ $user->address }}</h6>

                        @if($user->menuroles === 'student')
                        <h6>家長姓名1: {{ $userInfo['parent'][0]->name }}</h6>
                        <h6>家長英文姓名1: {{ $userInfo['parent'][0]->english_name }}</h6>
                        <h6>家長帳號/電子信箱1: {{ $userInfo['parent'][0]->email }}</h6>
                        <h6>家長電話1: {{ $userInfo['parent'][0]->telephone }}</h6>
                        <h6>家長Line1: {{ $userInfo['parent'][0]->line }}</h6>
                        <h6>家長姓名2: {{ $userInfo['parent'][1]->name }}</h6>
                        <h6>家長英文姓名2: {{ $userInfo['parent'][1]->english_name }}</h6>
                        <h6>家長帳號/電子信箱2: {{ $userInfo['parent'][1]->email }}</h6>
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