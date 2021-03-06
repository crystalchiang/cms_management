@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header"><h4>冊別列表</h4></div>
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
                        <div class="col-12">
                          <a href="{{ route('secondCategory.create') }}" class="btn btn-primary mb-3">{{ __('建立冊別') }}</a>
                        </div>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>系列代碼</th>
                            <th>系列名稱</th>
                            <th>冊別名稱</th>
                            <th>冊別代碼</th>
                            <th>說明</th>
                            <th>建立日期</th>
                            <th>最後更新時間</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($categories as $category)
                            <tr>
                              <td>{{ $category->first_cat_alias }}</td>
                              <td>{{ $category->first_cat_name }}</td>
                              <td>{{ $category->name }}</td>
                              <td>{{ $category->alias }}</td>
                              <td>{{ $category->description }}</td>
                              <td>{{ $category->created_at }}</td>
                              <td>{{ $category->updated_at }}</td>
                              <td>
                                <a href="{{ url('/secondCategory/' . $category->id) }}" class="btn btn-block btn-primary">檢視</a>
                              </td>
                              <td>
                                <a href="{{ url('/secondCategory/' . $category->id . '/edit') }}" class="btn btn-block btn-primary">編輯</a>
                              </td>
                              <td>
                                <form action="{{ route('secondCategory.destroy', $category->id ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-block btn-danger">刪除</button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

