@extends('dashboard.base')
@section('css')
    <link href="{{ asset('css/daterangepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2-coreui.css') }}" rel="stylesheet">
@endsection
@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                  <div class="card-header"><h4>新增服務</h4></div>
                    <div class="card-body" id="app">
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
                      <form method="POST" action="{{ route('service.store') }}">
                          @csrf
                          <input class="form-control" type="hidden" value="schoolAdmin" name="menuroles">
                          <!-- <input class="form-control" type="hidden" :value="class_day" name="class_day[]"> -->

                          <div class="form-group">
                              <label>服務名稱*</label>
                              <input class="form-control" type="text" placeholder="{{ __('服務名稱') }}" name="name" required autofocus>
                          </div>

                          <div class="form-group">
                              <label>服務分級*</label>
                              <select class="form-control" name="level" placeholder="請選擇" required>
                                @foreach($levels as $key => $item)
                                  <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                              </select>
                          </div>

                          <div class="form-group">
                              <label>服務說明*</label>
                              <input class="form-control" type="text" placeholder="{{ __('服務名稱') }}" name="description" required autofocus>
                          </div>

                          <div class="form-group">
                              <label>計價方式*</label>
                              <select class="form-control" name="type" v-model="type" placeholder="請選擇" required>
                                @foreach($types as $key => $item)
                                  <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                              </select>
                          </div>

                          <div v-if="type <= 1" class="form-group">
                              <label>對應題庫</label>
                              <select class="form-control" name="topic_id" placeholder="請選擇">
                                @foreach($topics as $key => $item)
                                  <option value="{{ $item->id }}">{{ $item->alias }}</option>
                                @endforeach
                              </select>
                          </div>

                          <div v-if="type != 2" class="form-group">
                              <label>服務收費價格</label>
                              <input class="form-control" type="number" onkeyup="value=value.replace(/[^\d.]/g,'')" placeholder="{{ __('服務收費價格') }}" name="price">
                          </div>
                          
                          <div class="row">
                            <div class="col-6">
                              <button class="btn btn-block btn-success" type="submit">{{ __('新增') }}</button>
                            </div>
                            <div class="col-6">
                              <a href="{{ route('service.index') }}" class="btn btn-block btn-primary">{{ __('返回') }}</a> 
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
<script src="{{ asset('js/jquery.slim.min.js') }}"></script>
<script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/daterangepicker.js') }}"></script>
<script src="{{ asset('js/advanced-forms.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
<script>
  var app = new Vue({
    el: '#app',
    data: {
      type: 0
    },
    computed: {
    }
  });
</script>
@endsection