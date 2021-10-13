@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header"><h4>班級課程設定</h4></div>
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
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>分校名稱</th>
                            <th>班級名稱</th>
                            <th>使用系列</th>
                            <th>開課日</th>
                            <th>課程預計結束日</th>
                            <th>課程付費起算日</th>
                            <th>課程付費截止日</th>
                            <th>課程應繳費用</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($classes as $class)
                            <tr>
                              <td>{{ $class->school_name }}</td>
                              <td>{{ $class->class_name }}</td>
                              <td>{{ $class->material }}</td>
                              <td>{{ $class->period_start_date }}</td>
                              <td>{{ $class->period_end_date }}</td>
                              <td>{{ $class->pay_start_date }}</td>
                              <td>{{ $class->pay_end_date }}</td>
                              <td>${{ $class->price }}</td>
                              <td>
                                <a href="{{ url('/classPrice/' . $class->id) }}" class="btn btn-block btn-primary">檢視</a>
                              </td>
                              <td>
                                <a href="{{ url('/classPrice/' . $class->id . '/edit') }}" class="btn btn-block btn-primary">編輯</a>
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

