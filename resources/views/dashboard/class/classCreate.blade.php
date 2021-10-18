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
                  <div class="card-header"><h4>新增班級</h4></div>
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
                      <form method="POST" action="{{ route('classInfo.store') }}">
                          @csrf
                          <input class="form-control" type="hidden" value="schoolAdmin" name="menuroles">
                          <!-- <input class="form-control" type="hidden" :value="class_day" name="class_day[]"> -->
                          
                          <div class="form-group">
                              <label>隸屬分校*</label>
                              <select class="form-control" name="branch_school_id" v-model="branch_school_id" placeholder="請選擇" required>
                                @foreach($branch_schools as $key => $item)
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <label>班級名稱*</label>
                              <input class="form-control" type="text" placeholder="{{ __('班級名稱') }}" name="name" required autofocus>
                          </div>

                          <div class="form-group">
                              <label>帶班教師*</label>
                              <select class="form-control" name="teacher_id" v-model="teacher_id" placeholder="請選擇" required>
                                @foreach($teachers as $key => $item)
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                              </select>
                          </div>

                          <div class="form-group">
                              <label>助教</label>
                              <select class="form-control" name="assistant_id" v-model="assistant_id" placeholder="請選擇">
                                @foreach($assistants as $key => $item)
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                              </select>
                          </div>

                          <div class="form-group">
                              <label>代課教師</label>
                              <select class="form-control" name="supply_teacher_id" v-model="supply_teacher_id" placeholder="請選擇">
                                @foreach($supplyTeachers as $key => $item)
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                              </select>
                          </div>

                          <div class="form-group">
                              <label>使用教材1*</label>
                              <select class="form-control" name="teaching_material_1" v-model="teaching_material_1" placeholder="請選擇" required>
                                @foreach($material as $key => $item)
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                              </select>
                          </div>

                          <div class="form-group">
                              <label>使用教材2</label>
                              <select class="form-control" name="teaching_material_2" v-model="teaching_material_2" placeholder="請選擇">
                                @foreach($material as $key => $item)
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                              </select>
                          </div>

                          <div class="form-group">
                              <label>使用教材3</label>
                              <select class="form-control" name="teaching_material_3" v-model="teaching_material_3" placeholder="請選擇">
                                @foreach($material as $key => $item)
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                              </select>
                          </div>

                          <div class="form-group">
                              <label>使用教材4</label>
                              <select class="form-control" name="teaching_material_4" v-model="teaching_material_4" placeholder="請選擇">
                                @foreach($material as $key => $item)
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                              </select>
                          </div>

                          <div class="form-group">
                              <label>本期起始日</label>
                              <input class="form-control" type="date" placeholder="{{ __('本期起始日') }}" name="period_start_date">
                          </div>

                          <div class="form-group">
                            <label>上課日</label>
                            <div class="col-md-12 col-form-label row">
                              <div class="form-check form-check-inline mr-3">
                                <input class="form-check-input" type="checkbox" name="class_day[]" value="1">
                                <label class="form-check-label" for="inline-checkbox1">星期一</label>
                              </div>
                              <div class="form-check form-check-inline mr-3">
                                <input class="form-check-input" type="checkbox" name="class_day[]" value="2">
                                <label class="form-check-label" for="inline-checkbox2">星期二</label>
                              </div>
                              <div class="form-check form-check-inline mr-3">
                                <input class="form-check-input" type="checkbox" name="class_day[]" value="3">
                                <label class="form-check-label" for="inline-checkbox3">星期三</label>
                              </div>
                              <div class="form-check form-check-inline mr-3">
                                <input class="form-check-input" type="checkbox" name="class_day[]" value="4">
                                <label class="form-check-label" for="inline-checkbox4">星期四</label>
                              </div>
                              <div class="form-check form-check-inline mr-3">
                                <input class="form-check-input" type="checkbox" name="class_day[]" value="5">
                                <label class="form-check-label" for="inline-checkbox5">星期五</label>
                              </div>
                              <div class="form-check form-check-inline mr-3">
                                <input class="form-check-input" type="checkbox" name="class_day[]" value="6">
                                <label class="form-check-label" for="inline-checkbox6">星期六</label>
                              </div>
                              <div class="form-check form-check-inline mr-3">
                                <input class="form-check-input" type="checkbox" name="class_day[]" value="7">
                                <label class="form-check-label" for="inline-checkbox7">星期日</label>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label>上課時段</label>
                            <select class="form-control" name="class_schedule" v-model="class_schedule" placeholder="請選擇">
                              @foreach($class_schedule as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                              @endforeach
                            </select>
                          </div>
                          
                          <div class="row">
                            <div class="col-6">
                              <button class="btn btn-block btn-success" type="submit">{{ __('新增') }}</button>
                            </div>
                            <div class="col-6">
                              <a href="{{ route('classInfo.index') }}" class="btn btn-block btn-primary">{{ __('返回') }}</a> 
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
      branch_school_id: "",
      teacher_id: "",
      assistant_id: "",
      supply_teacher_id: "",
      teaching_material_1: "",
      teaching_material_2: "",
      teaching_material_3: "",
      teaching_material_4: "",
      class_day: '',
    },
    computed: {
    }
  });
</script>
@endsection