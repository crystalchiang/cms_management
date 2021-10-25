@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <div class="card-header"><h4>編輯分校</h4></div>
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
                        <form method="POST" action="/schoolsBranch/{{ $school->id }}">
                            @csrf
                            @method('PUT')
                            <template id="app"> 
                            <div class="form-group">
                                <label>隸屬總校*</label>
                                <select class="form-control" name="main_school_id" value="{{ $school->main_school_id }}" placeholder="請選擇" required>
                                  @foreach($mainSchools as $key => $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                          </template>
                            <div class="form-group">
                                <label>分校名稱*</label>
                                <input class="form-control" type="text" placeholder="{{ __('分校名稱') }}" name="name" value="{{ $school->name }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>分校簡稱*</label>
                                <input class="form-control" type="text" placeholder="{{ __('分校簡稱') }}" name="alias" value="{{ $school->alias }}" required>
                            </div>

                            <div class="form-group">
                                <label>分校電話*</label>
                                <input class="form-control" type="text" placeholder="{{ __('分校電話') }}" name="telephone" value="{{ $school->telephone }}" required>
                            </div>

                            <div class="form-group">
                              <label>分校縣市*</label>
                              <input class="form-control" type="text" placeholder="{{ __('分校縣市') }}" value="{{ $school->city }}" name="city" required>
                            </div>

                            <div class="form-group">
                                <label>鄉鎮區域*</label>
                                <input class="form-control" type="text" placeholder="{{ __('鄉鎮區域') }}" value="{{ $school->area }}" name="area" required>
                            </div>

                            <div class="form-group">
                                <label>分校地址*</label>
                                <input class="form-control" type="text" placeholder="{{ __('分校地址') }}" name="address" value="{{ $school->address }}" required>
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