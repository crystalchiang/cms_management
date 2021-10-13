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
                    <div class="card-header">
                      <div class="card-header"><h4>編輯班級課程設定</h4></div>
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
                        <form method="POST" action="/classPrice/{{ $class->id }}" id="app">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>分校名稱</label>
                                <input class="form-control" type="text" placeholder="{{ __('分校名稱') }}" value="{{ $class->school_name }}" name="school_name" disabled>
                            </div>
                            <div class="form-group">
                                <label>班級名稱</label>
                                <input class="form-control" type="text" placeholder="{{ __('班級名稱') }}" value="{{ $class->school_name }}" name="class_name" disabled>
                            </div>
                            
                            <div class="form-group">
                                <label>使用系列</label>
                                <input class="form-control" type="text" placeholder="{{ __('使用系列') }}" value="{{ $class->material }}" name="material" disabled>
                            </div>

                            <div class="form-group">
                                <label>開課日</label>
                                <input class="form-control" type="date" value="{{ $class->period_start_date }}" placeholder="{{ __('開課日') }}" name="period_start_date" disabled>
                            </div>

                            <div class="form-group">
                                <label>課程預計結束日</label>
                                <input class="form-control" type="date" v-model="period_end_date" placeholder="{{ __('課程預計結束日') }}" name="period_end_date">
                            </div>

                            <div class="form-group">
                                <label>課程付費起算日</label>
                                <input class="form-control" type="date" v-model="pay_start_date" placeholder="{{ __('課程付費起算日') }}" name="pay_start_date">
                            </div>

                            <div class="form-group">
                                <label>課程付費截止日</label>
                                <input class="form-control" type="date" v-model="pay_end_date" placeholder="{{ __('課程付費截止日') }}" name="pay_end_date">
                            </div>

                            <div class="form-group">
                                <label>課程應繳費用*</label>
                                <input class="form-control" type="number" onkeyup="value=value.replace(/[^\d.]/g,'')" v-model="price" placeholder="{{ __('課程應繳費用') }}" name="price">
                            </div>
      
                            <div class="row">
                              <div class="col-6">
                                <button class="btn btn-block btn-success" type="submit">{{ __('儲存') }}</button>
                              </div>
                              <div class="col-6">
                                <a href="{{ route('schoolsBranch.index') }}" class="btn btn-block btn-primary">{{ __('返回') }}</a> 
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
      class: {}
    },
    computed: {
    },
    created() {
      this.class = @json($class);
      this.period_end_date = this.class.period_end_date;
      this.pay_start_date = this.class.pay_start_date;
      this.pay_end_date = this.class.pay_end_date;
      this.price = this.class.price;
      console.log(this.class)
      
    },
  });
</script>
@endsection