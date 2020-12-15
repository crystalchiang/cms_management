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
                        <h6>使用者名稱: {{ $user->name }}</h6>
                        <h6>電子信箱: {{ $user->email }}</h6>
                        <h6>權限: {{ __('auth.roles.'.$user->menuroles) }}</h6>
                        <h6>建立日期: {{ $user->created_at }}</h6>
                        <h6>最後更新日期: {{ $user->updated_at }}</h6>
                        <a href="{{ route('users.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection