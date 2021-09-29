@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                  <div class="card-header"><h4>新增分校</h4></div>
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
                      <form method="POST" action="{{ route('schoolsBranch.store') }}">
                          @csrf
                          <input class="form-control" type="hidden" value="schoolAdmin" name="menuroles">
                          <template id="app"> 
                            <div class="form-group">
                                <label>隸屬總校*</label>
                                <select class="form-control" name="main_school_id" v-model="main_school_id" placeholder="請選擇" required>
                                  @foreach($mainSchools as $key => $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                          </template>
                          <div class="form-group">
                              <label>分校名稱*</label>
                              <input class="form-control" type="text" placeholder="{{ __('分校名稱') }}" name="name" required autofocus>
                          </div>

                          <div class="form-group">
                              <label>分校簡稱*</label>
                              <input class="form-control" type="text" placeholder="{{ __('簡稱') }}" name="alias" required>
                          </div>

                          <div class="form-group">
                              <label>分校電話*</label>
                              <input class="form-control" type="tel" placeholder="{{ __('分校電話') }}" name="telephone" required>
                          </div>

                          <div class="form-group">
                              <label>分校地址*</label>
                              <input class="form-control" type="tel" placeholder="{{ __('分校地址') }}" name="address" required>
                          </div>

                          <div class="form-group">
                              <label>負責人姓名*</label>
                              <input class="form-control" type="text" placeholder="{{ __('負責人姓名') }}" name="principal_name" required>
                          </div>

                          <div class="form-group">
                              <label>負責人電話*</label>
                              <input class="form-control" type="tel" placeholder="{{ __('負責人電話') }}" name="principal_telephone" required>
                          </div>

                          <div class="form-group">
                              <label>負責人帳號/電子信箱*</label>
                              <input class="form-control" type="email" placeholder="{{ __('負責人帳號/電子信箱') }}" name="principal_email" required>
                          </div>

                          <div class="form-group">
                              <label>負責人密碼*</label>
                              <input class="form-control" type="password" placeholder="{{ __('密碼') }}" name="principal_password" required>
                          </div>

                          <div class="form-group">
                              <label>再次輸入密碼*</label>
                              <input class="form-control" type="password" placeholder="{{ __('再次輸入密碼') }}" name="principal_password_confirmation" required>
                          </div>

                          <div class="form-group">
                              <label>負責人 Line*</label>
                              <input class="form-control" type="text" placeholder="{{ __('Line') }}" name="principal_line" required>
                          </div>

                          <div class="form-group">
                              <label>到期日期</label>
                              <input class="form-control" type="date" placeholder="{{ __('到期日期') }}" name="expired_at">
                          </div>
                          </template>
                          
                          <div class="row">
                            <div class="col-6">
                              <button class="btn btn-block btn-success" type="submit">{{ __('新增') }}</button>
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
      main_school_id: ""
    },
    computed: {
    }
  });
</script>
@endsection