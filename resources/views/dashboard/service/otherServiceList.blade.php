@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header"><h4>平台服務設定</h4></div>
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
                          <a href="{{ route('service.create') }}" class="btn btn-primary mb-3">{{ __('建立服務') }}</a>
                        </div>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>服務編號</th>
                            <th>服務名稱</th>
                            <th>服務分級</th>
                            <th>服務說明</th>
                            <th>計價方式</th>
                            <th>服務收費</th>
                            <th>備註</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($services as $service)
                            <tr>
                              <td>{{ $service->id }}</td>
                              <td>{{ $service->name }}</td>
                              <td>{{ $levels[$service->level] }}</td>
                              <td>{{ $service->description }}</td>
                              <td>{{ $types[$service->type] }}</td>
                              @if($service->price > 0)
                                <td>${{ $service->price }}</td>
                              @else
                                <td>-</td>
                              @endif
                              <td>{{ $service->remark }}</td>
                              <td>
                                <a href="{{ url('/service/' . $service->id) }}" class="btn btn-block btn-primary">檢視</a>
                              </td>
                              <td>
                                <a href="{{ url('/service/' . $service->id . '/edit') }}" class="btn btn-block btn-primary">編輯</a>
                              </td>
                              <td>
                                <form action="{{ route('service.destroy', $service->id ) }}" method="POST">
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

