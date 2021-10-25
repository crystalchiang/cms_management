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
                                {{ $classes[0]->school_name }} 班級列表
                        <?php }else{ ?>
                                全部班級列表
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
                          <a href="{{ route('classInfo.create') }}" class="btn btn-primary mb-3">{{ __('建立班級') }}</a>
                        </div>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>分校名稱</th>
                            <th>班級名稱</th>
                            <th>帶班教師</th>
                            <th>助教</th>
                            <th>代課教師</th>
                            <th>使用教材1</th>
                            <th>使用教材2</th>
                            <th>使用教材3</th>
                            <th>使用教材4</th>
                            <th>本期起始日</th>
                            <th>上課日</th>
                            <th>上課時段</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($classes as $class)
                            <tr>
                              <td>{{ $class->school_name }}</td>
                              <td>{{ $class->name }}</td>
                              <td>{{ $class->teacher }}</td>
                              <td>{{ $class->assistant }}</td>
                              <td>{{ $class->supply_teacher }}</td>
                              <td>{{ $class->material_1 }}</td>
                              <td>{{ $class->material_2 }}</td>
                              <td>{{ $class->material_3 }}</td>
                              <td>{{ $class->material_4 }}</td>
                              <td>{{ $class->period_start_date }}</td>
                              <td>{{ $class->class_day_text }}</td>
                              <td>{{ $class->class_schedule_name }}</td>
                              <td>
                                <a href="{{ url('/classInfo/' . $class->id) }}" class="btn btn-block btn-primary">檢視</a>
                              </td>
                              <td>
                                <a href="{{ url('/classInfo/' . $class->id . '/edit') }}" class="btn btn-block btn-primary">編輯</a>
                              </td>
                              <td>
                                <form action="{{ route('classInfo.destroy', $class->id ) }}" method="POST">
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

