@extends('dashboard.base')

@section('content')
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-header">
                      <h4><i class="fa fa-align-justify"></i> 課別 {{ $category->name }}</h4>
                    </div>
                    <div class="card-body">
                      <h6>系列名稱: {{ $category->first_cat_name }}</h6>
                      <h6>系列代碼: {{ $category->first_cat_alias }}</h6>
                      <h6>冊別名稱: {{ $category->second_cat_name }}</h6>
                      <h6>冊別名稱: {{ $category->second_cat_alias }}</h6>
                      <h6>課別代碼: {{ $category->alias }}</h6>
                      <h6>課別名稱: {{ $category->name }}</h6>
                      <h6>說明: {{ $category->description }}</h6>
                      
                      <h6>建立日期: {{ $category->created_at }}</h6>
                      <h6>最後更新日期: {{ $category->updated_at }}</h6>
                      <div class="row mt-3">
                        <div class="col-6">
                          <a href="{{ route('thirdCategory.index') }}" class="btn btn-block btn-primary">{{ __('返回') }}</a> 
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