@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <div class="card-header"><h4>編輯使用者</h4></div>
                    <div class="card-body">
                        <br>
                        <form method="POST" action="/users/{{ $user->id }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>中文姓名</label>
                                <input class="form-control" type="text" placeholder="{{ __('中文姓名') }}" name="name" value="{{ $user->name }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>英文姓名</label>
                                <input class="form-control" type="text" placeholder="{{ __('英文姓名') }}" name="english_name" value="{{ $user->english_name }}" required>
                            </div>

                            <div class="form-group">
                                <label>帳號/電子信箱</label>
                                <input class="form-control" type="email" placeholder="{{ __('帳號/電子信箱') }}" value="{{ $user->email }}" name="email" required>
                            </div>

                            <div class="form-group">
                                <label>密碼</label>
                                <input class="form-control" type="password" placeholder="{{ __('密碼') }}" name="password">
                            </div>

                            <div class="form-group">
                                <label>再次輸入密碼</label>
                                <input class="form-control" type="password" placeholder="{{ __('再次輸入密碼') }}" name="password_confirmation">
                            </div>

                            <div class="form-group">
                                <label>角色</label>
                                <input class="form-control" type="hidden" value="{{ $user->menuroles }}" name="menuroles">
                                <select class="form-control" value="{{ $user->menuroles }}" name="menuroles" disabled>
                                    <option value="{{ $user->menuroles }}">{{ __('auth.roles.'.$user->menuroles) }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>電話</label>
                                <input class="form-control" type="tel" placeholder="{{ __('電話') }}" value="{{ $user->telephone }}" name="telephone" required>
                            </div>
                            <div class="form-group">
                                <label>Line</label>
                                <input class="form-control" type="text" placeholder="{{ __('Line') }}" value="{{ $user->line }}" name="line">
                            </div>
                            <div class="form-group">
                                <label>地址</label>
                                <input class="form-control" type="text" placeholder="{{ __('地址') }}" value="{{ $user->address }}" name="address">
                            </div>

                            @if($user->menuroles === 'student')
                            <input type="hidden" name="parent_a_id" id="form-field-1" value="{{ $userInfo['parent'][0]->id }}" class="form-control" required />
                            <input type="hidden" name="parent_b_id" id="form-field-1" value="{{ $userInfo['parent'][1]->id }}" class="form-control" required />
                            <input type="hidden" name="student_id" id="form-field-1" value="{{ $userInfo['base']->id }}" class="form-control" required />
                            <input type="hidden" name="student_user_id" id="form-field-1" value="{{ $user->id }}" class="form-control" required />
                            <div class="form-group">
                              <label>家長姓名1</label>
                              <input class="form-control" type="text" placeholder="{{ __('家長姓名') }}" value="{{ $userInfo['parent'][0]->name }}" name="parent_a_name" required>
                            </div>

                            <div class="form-group">
                              <label>家長帳號/電子信箱1</label>
                              <input class="form-control" type="text" placeholder="{{ __('家長帳號/電子信箱1') }}" value="{{ $userInfo['parent'][0]->email }}" name="parent_a_email" disabled required>
                            </div>

                            <div class="form-group">
                              <label>密碼1</label>
                              <input class="form-control" type="password" placeholder="{{ __('密碼') }}" name="parent_a_password">
                            </div>

                            <div class="form-group">
                              <label>家長電話1</label>
                              <input class="form-control" type="tel" placeholder="{{ __('家長電話') }}" value="{{ $userInfo['parent'][0]->telephone }}" name="parent_a_telephone" required>
                            </div>

                            <div class="form-group">
                              <label>家長Line1</label>
                              <input class="form-control" type="text" placeholder="{{ __('家長Line') }}" value="{{ $userInfo['parent'][0]->line }}" name="parent_a_line" required>
                            </div>

                            <div class="form-group">
                              <label>家長姓名2</label>
                              <input class="form-control" type="text" placeholder="{{ __('家長姓名') }}" value="{{ $userInfo['parent'][1]->name }}" name="parent_b_name" required>
                            </div>

                            <div class="form-group">
                              <label>家長帳號/電子信箱2</label>
                              <input class="form-control" type="text" placeholder="{{ __('家長帳號/電子信箱2') }}" value="{{ $userInfo['parent'][1]->email }}" name="parent_b_email" disabled required>
                            </div>

                            <div class="form-group">
                              <label>密碼2</label>
                              <input class="form-control" type="password" placeholder="{{ __('密碼') }}" name="parent_b_password">
                            </div>

                            <div class="form-group">
                              <label>家長電話2</label>
                              <input class="form-control" type="tel" placeholder="{{ __('家長電話') }}" value="{{ $userInfo['parent'][1]->telephone }}" name="parent_b_telephone" required>
                            </div>

                            <div class="form-group">
                              <label>家長Line2</label>
                              <input class="form-control" type="text" placeholder="{{ __('家長Line') }}" value="{{ $userInfo['parent'][1]->line }}" name="parent_b_line" required>
                            </div>

                            <div class="form-group">
                              <label>入學日</label>
                              <input class="form-control" type="date" placeholder="{{ __('入學日') }}" value="{{ $userInfo['base']->start_date }}" name="start_date" required>
                            </div>

                            <div class="form-group">
                              <label>退學日</label>
                              <input class="form-control" type="date" placeholder="{{ __('退學日') }}" value="{{ $userInfo['base']->expire_date }}" name="expire_date" required>
                            </div>

                            <div class="form-group">
                                <label>備註</label>
                                <input class="form-control" type="text" placeholder="{{ __('備註') }}" value="{{ $userInfo['base']->other }}" name="other">
                            </div>
                            @endif

                            <div class="row">
                              <div class="col-6">
                                <button class="btn btn-block btn-success" type="submit">{{ __('儲存') }}</button>
                              </div>
                              <div class="col-6">
                                <a href="{{ route('users.index') }}" class="btn btn-block btn-primary">{{ __('返回') }}</a> 
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

@endsection