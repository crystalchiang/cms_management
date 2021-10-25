@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <div class="card-header"><h4>編輯總校</h4></div>
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
                        <form method="POST" action="/schools/{{ $school->id }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>總校名稱*</label>
                                <input class="form-control" type="text" placeholder="{{ __('總校名稱') }}" name="name" value="{{ $school->name }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>總校簡稱*</label>
                                <input class="form-control" type="text" placeholder="{{ __('總校簡稱') }}" name="alias" value="{{ $school->alias }}" required>
                            </div>
                            <div class="form-group">
                                <label>分類*</label>
                                <select class="form-control" name="category_id" value="{{ $school->category_id }}" placeholder="請選擇" required>
                                    @foreach($categories as $item)
                                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>立案證號*</label>
                                <input class="form-control" type="text" placeholder="{{ __('立案證號') }}" name="identity_id" value="{{ $school->identity_id }}" required>
                            </div>

                            <div class="form-group">
                                <label>總校電話*</label>
                                <input class="form-control" type="text" placeholder="{{ __('總校電話') }}" name="telephone" value="{{ $school->telephone }}" required>
                            </div>

                            <div class="form-group">
                              <label>總校縣市*</label>
                              <input class="form-control" type="text" placeholder="{{ __('總校縣市') }}" value="{{ $school->city }}" name="city" required>
                            </div>

                            <div class="form-group">
                                <label>鄉鎮區域*</label>
                                <input class="form-control" type="text" placeholder="{{ __('鄉鎮區域') }}" value="{{ $school->area }}" name="area" required>
                            </div>

                            <div class="form-group">
                                <label>地址*</label>
                                <input class="form-control" type="text" placeholder="{{ __('總校地址') }}" name="address" value="{{ $school->address }}" required>
                            </div>

                            <div class="form-group">
                                <label>總校網址</label>
                                <input class="form-control" type="text" placeholder="{{ __('總校網址') }}" name="website" value="{{ $school->website }}">
                            </div>

                            <input type="hidden" name="principal_id" value="{{ $school->principal_id }}">

                            <div class="form-group">
                              <label>負責人姓名*</label>
                              <input class="form-control" type="text" placeholder="{{ __('負責人姓名') }}" name="principal_name" value="{{ $school->p_name }}" required>
                            </div>

                            <div class="form-group">
                                <label>負責人電話*</label>
                                <input class="form-control" type="tel" placeholder="{{ __('負責人電話') }}" name="principal_telephone" value="{{ $school->p_telephone }}" required>
                            </div>

                            <div class="form-group">
                                <label>負責人帳號/電子信箱*</label>
                                <input class="form-control" type="email" placeholder="{{ __('負責人帳號/電子信箱') }}" name="principal_email" value="{{ $school->p_email }}" required>
                            </div>

                            <div class="form-group">
                                <label>負責人密碼</label>
                                <input class="form-control" type="password" placeholder="{{ __('密碼') }}" name="principal_password">
                            </div>

                            <div class="form-group">
                                <label>再次輸入密碼</label>
                                <input class="form-control" type="password" placeholder="{{ __('再次輸入密碼') }}" name="principal_password_confirmation">
                            </div>

                            <div class="form-group">
                                <label>負責人 Line*</label>
                                <input class="form-control" type="text" placeholder="{{ __('Line') }}" name="principal_line" value="{{ $school->p_line }}" required>
                            </div>

                            <div class="form-group">
                                <label>到期日期</label>
                                <input class="form-control" type="date" placeholder="{{ __('到期日期') }}" value="{{ $school->expired_at }}" name="expired_at">
                            </div>

                            <div class="row">
                              <div class="col-6">
                                <button class="btn btn-block btn-success" type="submit">{{ __('儲存') }}</button>
                              </div>
                              <div class="col-6">
                                <a href="{{ route('schools.index') }}" class="btn btn-block btn-primary">{{ __('返回') }}</a> 
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
      category_id: ""
    },
    computed: {
    }
  });
</script>
@endsection