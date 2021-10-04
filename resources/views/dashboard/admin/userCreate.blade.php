@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                  <div class="card-header"><h4>新增使用者</h4></div>
                    <div class="card-body">
                    <template id="app"> 
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>中文姓名</label>
                                <input class="form-control" type="text" placeholder="{{ __('姓名') }}" name="name" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>英文姓名</label>
                                <input class="form-control" type="text" placeholder="{{ __('英文姓名') }}" name="english_name" required autofocus>
                            </div>

                            <div class="form-group">
                                <label>帳號/電子信箱</label>
                                <input class="form-control" type="email" placeholder="{{ __('帳號/電子信箱') }}" name="email" required>
                            </div>

                            <div class="form-group">
                                <label>密碼</label>
                                <input class="form-control" type="password" placeholder="{{ __('密碼') }}" name="password" required>
                            </div>

                            <div class="form-group">
                                <label>再次輸入密碼</label>
                                <input class="form-control" type="password" placeholder="{{ __('再次輸入密碼') }}" name="password_confirmation" required>
                            </div>

                            <div class="form-group">
                                <label>角色</label>
                                <select class="form-control" name="menuroles" v-model="role" placeholder="請選擇">
                                    @foreach($roles as $role)
                                      <option value="{{ $role->name }}">{{ __($role->name) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>電話</label>
                                <input class="form-control" type="tel" placeholder="{{ __('電話') }}" name="telephone" required>
                            </div>
                            <div class="form-group">
                                <label>Line</label>
                                <input class="form-control" type="text" placeholder="{{ __('Line') }}" name="line">
                            </div>
                            <div class="form-group">
                                <label>地址</label>
                                <input class="form-control" type="text" placeholder="{{ __('地址') }}" name="address">
                            </div>

                            <template v-if="role === 'student'">
                              <div class="form-group">
                                <label>家長姓名1</label>
                                <input class="form-control" type="text" placeholder="{{ __('家長姓名') }}" name="parent_a_name" required>
                              </div>
                              <div class="form-group">
                                <label>家長英文姓名1</label>
                                <input class="form-control" type="text" placeholder="{{ __('家長英文姓名') }}" name="parent_a_english_name">
                              </div>

                              <div class="form-group">
                                <label>家長帳號/電子信箱1</label>
                                <input class="form-control" type="text" placeholder="{{ __('家長帳號/電子信箱') }}" name="parent_a_email" required>
                              </div>

                              <div class="form-group">
                                <label>家長密碼1</label>
                                <input class="form-control" type="password" placeholder="{{ __('密碼') }}" name="parent_a_password" required>
                              </div>

                              <div class="form-group">
                                <label>家長電話1</label>
                                <input class="form-control" type="tel" placeholder="{{ __('家長電話') }}" name="parent_a_telephone" required>
                              </div>

                              <div class="form-group">
                                <label>家長Line1</label>
                                <input class="form-control" type="text" placeholder="{{ __('家長Line') }}" name="parent_a_line">
                              </div>

                              <div class="form-group">
                                <label>家長姓名2</label>
                                <input class="form-control" type="text" placeholder="{{ __('家長姓名') }}" name="parent_b_name" required>
                              </div>

                              <div class="form-group">
                                <label>家長英文姓名2</label>
                                <input class="form-control" type="text" placeholder="{{ __('家長英文姓名') }}" name="parent_b_english_name">
                              </div>

                              <div class="form-group">
                                <label>家長帳號/電子信箱2</label>
                                <input class="form-control" type="text" placeholder="{{ __('家長帳號/電子信箱') }}" name="parent_b_email" required>
                              </div>

                              <div class="form-group">
                                <label>家長密碼2</label>
                                <input class="form-control" type="password" placeholder="{{ __('密碼') }}" name="parent_b_password" required>
                              </div>

                              <div class="form-group">
                                <label>家長電話2</label>
                                <input class="form-control" type="tel" placeholder="{{ __('家長電話') }}" name="parent_b_telephone" required>
                              </div>

                              <div class="form-group">
                                <label>家長Line2</label>
                                <input class="form-control" type="text" placeholder="{{ __('家長Line') }}" name="parent_b_line">
                              </div>

                              <div class="form-group">
                                <label>入學日</label>
                                <input class="form-control" type="date" placeholder="{{ __('入學日') }}" name="start_date" required>
                              </div>

                              <div class="form-group">
                                <label>退學日</label>
                                <input class="form-control" type="date" placeholder="{{ __('退學日') }}" name="expire_date" required>
                              </div>

                              <div class="form-group">
                                  <label>備註</label>
                                  <input class="form-control" type="text" placeholder="{{ __('備註') }}" name="other">
                              </div>
                            </template>
                            
                            <div class="row">
                              <div class="col-6">
                                <button class="btn btn-block btn-success" type="submit">{{ __('新增') }}</button>
                              </div>
                              <div class="col-6">
                                <a href="{{ route('users.index') }}" class="btn btn-block btn-primary">{{ __('返回') }}</a> 
                              </div>
                            </div>
                        </form>
                      </template>
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
      role: ""
    },
    computed: {
    }
  });
</script>
@endsection