@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <div class="card-header"><h4>編輯中分類</h4></div>
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
                        <form method="POST" action="/thirdCategory/{{ $category->id }}" id="app">
                            @csrf
                            @method('PUT')
                            <div>
                              <div class="form-group">
                                  <label>系列*</label>
                                  <select class="form-control" name="first_cat_id" v-model="first_cat_id" placeholder="請選擇" @change="changeFirstCat" required>
                                    <option v-for="item in first_categories" :value="item.id">@{{ item.name }}</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label>冊別*</label>
                                  <select class="form-control" name="second_cat_id" v-model="second_cat_id" placeholder="請選擇" @change="changeSecondCat" required>
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
                                <input class="form-control" type="text" v-model="name" placeholder="{{ __('課別名稱') }}" name="name" required autofocus>
                            </div>

                            <div class="form-group">
                                <label>說明</label>
                                <input class="form-control" type="text" placeholder="{{ __('說明') }}" name="description" value="{{ $category->description }}">
                            </div>

                            <div class="row">
                              <div class="col-6">
                                <button class="btn btn-block btn-success" type="submit">{{ __('儲存') }}</button>
                              </div>
                              <div class="col-6">
                                <a href="{{ route('thirdCategory.index') }}" class="btn btn-block btn-primary">{{ __('返回') }}</a> 
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
      second_cat_id: "",
      second_cat_alias: "",
      first_categories: [],
      second_categories: [],
      name: "",
      alias: ""
    },
    created() {
      $this = this;
      $this.first_categories = @json($first_categories);
      $this.first_cat_id = @json($category->first_cat_id);
      $this.second_cat_id = @json($category->second_cat_id);
      const cagetory = @json($category);
      const first_cat_id = $this.first_cat_id;
      let second_categories;
      
      $this.first_categories.forEach(function(item){
        if(item.id == first_cat_id){
          second_categories = item.second_categories;
        }
      });
      
      second_categories.forEach(function(item){
        if(item.id == cagetory.second_cat_id){
          $this.second_cat_alias = item.alias;
        }
      });
      $this.second_categories = second_categories;
      $this.name = cagetory.name;
      $this.alias = cagetory.alias;
    },
    computed: {
      genAliasName: function(){
        return this.second_cat_alias + '-' + this.name;
      }
    },
    methods: {
      changeFirstCat(){
        $this = this;
        let second_categories;
        $this.first_categories.forEach(function(item){
          if(item.id == $this.first_cat_id){
            second_categories = item.second_categories;
          }
        });
        $this.second_categories = second_categories;
        $this.second_cat_id = $this.second_categories[0].id;
        $this.second_cat_alias = $this.second_categories[0].alias;
      },
      changeSecondCat(){
        $this = this;
        let second_categories;
        $this.second_categories.forEach(function(item){
          if(item.id == $this.second_cat_id){
            $this.second_cat_alias = item.alias;
          }
        });
      }
    },
  });
</script>
@endsection