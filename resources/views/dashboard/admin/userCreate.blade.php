@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('建立使用者') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>使用者名稱</label>
                                <input class="form-control" type="text" placeholder="{{ __('使用者名稱') }}" name="name" required autofocus>
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
                                <label>電子信箱</label>
                                <input class="form-control" type="email" placeholder="{{ __('電子信箱') }}" name="email" required>
                            </div>

                            <div class="form-group">
                                <label>角色</label>
                                <select class="form-control" name="menuroles">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ __('auth.roles.'.$role->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                              <div class="col-6">
                                <button class="btn btn-block btn-success" type="submit">{{ __('Add') }}</button>
                              </div>
                              <div class="col-6">
                                <a href="{{ route('users.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a> 
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