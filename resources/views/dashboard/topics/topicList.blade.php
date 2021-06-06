@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header"><h4>考券列表</h4></div>
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
                          <a href="{{ route('topics.create') }}" class="btn btn-primary mb-3">{{ __('建立考券') }}</a>
                        </div>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>編號</th>
                            <th>名稱</th>
                            <th>系列</th>
                            <th>建立日期</th>
                            <th>最後更新時間</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($topics as $topic)
                            <tr>
                              <td>{{ $topic->alias }}</td>
                              <td>{{ $topic->name }}</td>
                              <td>{{ $topic->first_cat_name }}</td>
                              <td>{{ $topic->created_at }}</td>
                              <td>{{ $topic->updated_at }}</td>
                              <!-- <td>
                                <a href="{{ url('/topics/' . $topic->id) }}" class="btn btn-block btn-primary">檢視</a>
                              </td> -->
                              <td>
                                <a href="{{ url('/topics/' . $topic->id . '/edit') }}" class="btn btn-block btn-primary">編輯</a>
                              </td>
                              <td>
                                <form action="{{ route('topics.destroy', $topic->id ) }}" method="POST">
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
