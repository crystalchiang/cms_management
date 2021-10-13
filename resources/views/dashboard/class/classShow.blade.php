@extends('dashboard.base')

@section('content')
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-header">
                      <h4><i class="fa fa-align-justify"></i> {{ $class->school_name }} - {{ $class->name }}</h4>
                    </div>
                    <div class="card-body">
                        <h6>隸屬分校: {{ $class->school_name }}</h6>
                        <h6>班級名稱: {{ $class->name }}</h6>
                        <h6>帶班教師: {{ $class->teacher }}</h6>
                        <h6>助教: {{ $class->assistant }}</h6>
                        <h6>代課教師: {{ $class->supply_teacher }}</h6>

                        <h6>使用教材1: {{ $class->material_1 }}</h6>
                        <h6>使用教材2: {{ $class->material_2 }}</h6>
                        <h6>使用教材3: {{ $class->material_3 }}</h6>
                        <h6>使用教材4: {{ $class->material_4 }}</h6>

                        <h6>本期起始日: {{ $class->period_start_date }}</h6>
                        <h6>上課日: {{ $class->class_day_text }}</h6>
                        <h6>上課時段: {{ $class->class_schedule_name }}</h6>
                        <h6>建立日期: {{ $class->created_at }}</h6>
                        <h6>最後更新日期: {{ $class->updated_at }}</h6>
                        <div class="row mt-3">
                          <div class="col-6">
                            <a href="{{ route('classInfo.index') }}" class="btn btn-block btn-primary">{{ __('返回') }}</a> 
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