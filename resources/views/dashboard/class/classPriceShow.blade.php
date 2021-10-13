@extends('dashboard.base')

@section('content')
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-header">
                      <h4><i class="fa fa-align-justify"></i> {{ $class->school_name }} - {{ $class->class_name }}</h4>
                    </div>
                    <div class="card-body">
                        <h6>分校名稱: {{ $class->school_name }}</h6>
                        <h6>班級名稱: {{ $class->class_name }}</h6>
                        <h6>使用系列: {{ $class->material }}</h6>
                        <h6>開課日: {{ $class->period_start_date }}</h6>
                        <h6>課程預計結束日: {{ $class->period_end_date }}</h6>

                        <h6>課程付費起算日: {{ $class->pay_start_date }}</h6>
                        <h6>課程付費截止日: {{ $class->pay_end_date }}</h6>
                        <h6>課程應繳費用: ${{ $class->price }}</h6>
                        <h6>建立日期: {{ $class->created_at }}</h6>
                        <h6>最後更新日期: {{ $class->updated_at }}</h6>
                        <div class="row mt-3">
                          <div class="col-6">
                            <a href="{{ route('classPrice.index') }}" class="btn btn-block btn-primary">{{ __('返回') }}</a> 
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