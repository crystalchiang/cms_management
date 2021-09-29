@extends('dashboard.base')

@section('content')
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-header">
                      <h4><i class="fa fa-align-justify"></i> 分校 {{ $school->name }}</h4>
                    </div>
                    <div class="card-body">
                        <h6>總校名稱: {{ $school->main_name }}</h6>
                        <h6>分類: {{ $school->category_name }}</h6>
                        <h6>分校名稱: {{ $school->name }}</h6>
                        <h6>分校簡稱: {{ $school->alias }}</h6>
                        <h6>分校編號: {{ $school->code }}</h6>
                        <h6>分校電話: {{ $school->telephone }}</h6>
                        <h6>分校地址: {{ $school->address }}</h6>

                        <h6>負責人姓名: {{ $school->p_name }}</h6>
                        <h6>負責人電話: {{ $school->p_telephone }}</h6>
                        <h6>負責人帳號/電子信箱: {{ $school->p_email }}</h6>
                        <h6>負責人Line: {{ $school->p_line }}</h6>

                        <h6>到期日期: {{ $school->expired_at }}</h6>
                        <h6>建立日期: {{ $school->created_at }}</h6>
                        <h6>最後更新日期: {{ $school->updated_at }}</h6>
                        <div class="row mt-3">
                          <div class="col-6">
                            <a href="{{ route('schoolsBranch.index') }}" class="btn btn-block btn-primary">{{ __('返回') }}</a> 
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