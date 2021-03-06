@extends('dashboard.base')

@section('content')
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                  <div class="card-header"><h4>新增課別</h4></div>
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
                      <form method="POST" action="{{ route('thirdCategory.store') }}" id="app">
                          @csrf
                          <div>
                            <div class="form-group">
                                <label>系列</label>
                                <select class="form-control" name="first_cat_id" v-model="first_cat_id" placeholder="請選擇" @change="changeFirstCat" required>
                                  <option v-for="item in first_categories" :value="item.id">@{{ item.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>冊別</label>
                                <select class="form-control" name="second_cat_id" v-model="second_cat_id" placeholder="請選擇" required>
                                  <option v-for="item in second_categories" :value="item.id">@{{ item.name }}</option>
                                </select>
                            </div>
                          </div>
                          
                          <div class="form-group">
                              <label>課別代碼*</label>
                              <input class="form-control" type="text" placeholder="{{ __('課別代碼') }}" :value="genAliasName" disabled required>
                              <input type="hidden" name="alias" :value="genAliasName">
                          </div>

                          <div class="form-group">
                              <label>課別名稱*</label>
                              <input class="form-control" type="text" placeholder="{{ __('課別名稱') }}" v-model="name" name="name" required autofocus>
                          </div>

                          <div class="form-group">
                              <label>說明</label>
                              <input class="form-control" type="text" placeholder="{{ __('說明') }}" name="description">
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
      first_cat_id: "",
      first_cat_alias: "",
      second_cat_id: "",
      second_cat_alias: "",
      first_categories: [],
      second_categories: [],
      name: ""
    },
    created() {
      this.first_categories = @json($first_categories);
      // console.log(this.first_categories);
      this.first_cat_id = this.first_categories[0].id;
      this.first_cat_alias = this.first_categories[0].alias;
      this.second_categories = this.first_categories[0].second_categories;
      this.second_cat_id = this.first_categories[0].second_categories[0].id;
      this.second_cat_alias = this.first_categories[0].second_categories[0].alias;
    },
    computed: {
      genAliasName: function(){
        return this.second_cat_alias + '-' + this.name
      }
    },
    methods: {
      changeFirstCat(){
        const first_cat_id = this.first_cat_id;
        let second_categories;
        this.first_categories.forEach(function(item){
          if(item.id == first_cat_id){
            second_categories = item.second_categories;
          }
        });
        this.second_categories = second_categories;
        this.second_cat_id = this.second_categories[0].id;
      }
    },
  });
</script>
@endsection