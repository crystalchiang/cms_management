@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <div class="card-header"><h4>編輯中分類</h4></div>
                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                </div>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <br>
                        <form method="POST" action="/secondCategory/{{ $category->id }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                              <label>大分類</label>
                              <select class="form-control" name="first_cat_id" value="{{$category->first_cat_id}}" placeholder="請選擇">
                                  @foreach($first_categories as $item)
                                  @if($item->id == $category->first_cat_id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                  @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endif
                                  @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                                <label>中分類名稱*</label>
                                <input class="form-control" type="text" placeholder="{{ __('中分類名稱') }}" name="name" value="{{ $category->name }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>簡稱*</label>
                                <input class="form-control" type="text" placeholder="{{ __('簡稱') }}" name="alias" value="{{ $category->alias }}" required>
                            </div>
                            <div class="form-group">
                                <label>說明</label>
                                <input class="form-control" type="text" placeholder="{{ __('說明') }}" name="description" value="{{ $category->description }}">
                            </div>

                            <div class="row">
                              <div class="col-6">
                                <button class="btn btn-block btn-success" type="submit">{{ __('儲存') }}</button>
                              </div>
                              <div class="col-6">
                                <a href="{{ route('secondCategory.index') }}" class="btn btn-block btn-primary">{{ __('返回') }}</a> 
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('javascript')
@endsection