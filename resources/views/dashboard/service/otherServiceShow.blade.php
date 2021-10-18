@extends('dashboard.base')

@section('content')
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-header">
                      <h4><i class="fa fa-align-justify"></i> {{ $service->name }}</h4>
                    </div>
                    <div class="card-body">
                        <h6>服務編號: {{ $service->id }}</h6>
                        <h6>服務名稱: {{ $service->name }}</h6>
                        <h6>服務分級: {{ $levels[$service->level] }}</h6>
                        <h6>服務說明: {{ $service->description }}</h6>
                        <h6>計價方式: {{ $types[$service->type] }}</h6>

                        <h6>對應題庫: {{ $service->alias }}</h6>
                        <h6>服務收費價格: {{ $service->price }}</h6>
                        <h6>建立日期: {{ $service->created_at }}</h6>
                        <h6>最後更新日期: {{ $service->updated_at }}</h6>
                        <div class="row mt-3">
                          <div class="col-6">
                            <a href="{{ route('otherService.index') }}" class="btn btn-block btn-primary">{{ __('返回') }}</a> 
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