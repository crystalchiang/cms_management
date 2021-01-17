@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                  <div class="card-header"><h4>新增題庫</h4></div>
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
                      <form method="POST" action="{{ route('topics.store') }}" id="app">
                          @csrf
                          <div class="form-group">
                              <label>題庫名稱*</label>
                              <input class="form-control" type="text" placeholder="{{ __('題庫名稱') }}" name="name" required autofocus>
                          </div>

                          <div class="form-group">
                              <label>題庫分級</label>
                              <select class="form-control" name="level_id" placeholder="請選擇">
                                  @foreach($topicLevels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                  @endforeach
                              </select>
                          </div>

                          <div class="form-group">
                              <label>題庫類型</label>
                              <select class="form-control" name="type_id" placeholder="請選擇">
                                  @foreach($topicTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                  @endforeach
                              </select>
                          </div>

                          <div class="row">
                            <div class="col-6">
                              <button class="btn btn-block btn-success" type="submit">{{ __('新增') }}</button>
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
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
<script>
  var app = new Vue({
    el: '#app',
    data: {
    },
    created() {
    },
    computed: {
    },
    methods: {
    },
  });
</script>
@endsection