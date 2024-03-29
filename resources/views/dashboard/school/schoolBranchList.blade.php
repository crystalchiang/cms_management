@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <h4>
                        <?php if($isSelectMain){ ?>
                                {{ $schools[0]->main_name }} 分校列表
                        <?php }else{ ?>
                                全部分校列表
                        <?php } ?>
                      </h4>
                    </div>
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
                          <a href="{{ route('schoolsBranch.create') }}" class="btn btn-primary mb-3">{{ __('建立分校') }}</a>
                        </div>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>分校名稱</th>
                            <th>簡稱</th>
                            <th>編號</th>
                            <th>縣市</th>
                            <th>鄉鎮區域</th>
                            <th>地址</th>
                            <th>電話</th>
                            <th>班級數</th>
                            <th>教師總數</th>
                            <th>助教總數</th>
                            <th>學生總數</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($schools as $school)
                            <tr>
                              <td><a href="/classInfo?id=<?php echo $school->id; ?>">{{ $school->name }}</a></td>
                              <td>{{ $school->alias }}</td>
                              <td>{{ $school->code }}</td>
                              <td>{{ $school->city }}</td>
                              <td>{{ $school->area }}</td>
                              <td>{{ $school->address }}</td>
                              <td>{{ $school->telephone }}</td>
                              <td>{{ $school->class_total }}</td>
                              <td>{{ $school->teachers_total }}</td>
                              <td>{{ $school->assistant_total }}</td>
                              <td>{{ $school->students_total }}</td>
                              <td>
                                <a href="{{ url('/schoolsBranch/' . $school->id) }}" class="btn btn-block btn-primary">檢視</a>
                              </td>
                              <td>
                                <a href="{{ url('/schoolsBranch/' . $school->id . '/edit') }}" class="btn btn-block btn-primary">編輯</a>
                              </td>
                              <td>
                                <form action="{{ route('schoolsBranch.destroy', $school->id ) }}" method="POST">
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

