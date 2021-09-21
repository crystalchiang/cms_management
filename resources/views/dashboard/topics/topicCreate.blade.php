@extends('dashboard.base')

@section('content')
<form method="POST" action="{{ route('topics.store') }}">
    @csrf
        <div class="container-fluid">
          <div class="animated fadeIn" id="app">
            <div class="row">
              <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="card" >
                  <div class="card-header"><h4>新增考券</h4></div>
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
                          <!-- <div class="form-group">
                              <label>考券名稱*</label>
                              <input class="form-control" type="text" placeholder="{{ __('考券名稱') }}" name="name" required autofocus>
                          </div> -->
                          <div>
                            <div class="form-group">
                                <label>系列</label>
                                <select class="form-control" name="first_cat_id" v-model="first_cat_id" placeholder="請選擇" @change="changeFirstCat" required>
                                  <option v-for="item in first_categories" :value="item.id">@{{ item.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>冊別</label>
                                <select class="form-control" name="second_cat_id" v-model="second_cat_id" placeholder="請選擇" @change="changeSecondCat" required>
                                  <option v-for="item in second_categories" :value="item.id">@{{ item.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>課別</label>
                                <select class="form-control" name="third_cat_id" v-model="third_cat_id" placeholder="請選擇">
                                  <option v-for="item in third_categories" :value="item.id">@{{ item.name }}</option>
                                </select>
                            </div>
                          </div>

                          <div class="form-group">
                              <label>考卷代碼*</label>
                              <input class="form-control" type="text" placeholder="{{ __('考券代碼') }}" :value="genAliasName" disabled required>
                              <input type="hidden" name="alias" :value="genAliasName">
                          </div>

                          <div class="form-group">
                              <label>考卷名稱*</label>
                              <input class="form-control" type="text" placeholder="{{ __('考券名稱') }}" v-model="name" name="name" required autofocus>
                          </div>

                          <div class="form-group">
                              <label>考卷類型*</label>
                              <select class="form-control" name="type" v-model="type" placeholder="請選擇" required>
                                <option v-for="(item,key) in types" :value="key">@{{ item }}</option>
                              </select>
                          </div>
                          <input type="hidden" name="contents" v-model="contentStringify"/>

                          <div class="row">
                            <div class="col-6">
                              <button class="btn btn-block btn-success" type="submit">{{ __('儲存考券') }}</button>
                            </div>
                            <div class="col-6">
                              <a href="{{ route('topics.index') }}" class="btn btn-block btn-primary">{{ __('返回') }}</a> 
                            </div>
                          </div>
                    </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="card">
                  <div class="card-header">
                    <div class="row d-flex justify-content-end">
                      <div class="col-2">
                        <a class="btn btn-block btn-info" style="color:#FFF;" @click="insertQ(1)">{{ __('新增題組') }}</a>
                      </div>
                      <div class="col-2">
                        <a class="btn btn-block btn-info" style="color:#FFF;" @click="insertQ(2)">{{ __('新增題目') }}</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div v-for="(item, index) in contents">
                      <div class="d-flex justify-content-between">
                        <div>
                          <h3>@{{index + 1}}.</h3>
                        </div>
                        <div class="d-flex">
                          <div v-if="item.type == 1">
                            <button class="btn btn-block btn-outline-dark" @click="insertChildQ(index)">{{ __('新增') }}</button>
                          </div>
                          <div class="ml-4">
                            <button class="btn btn-block btn-outline-danger" @click="deleteQ(1, index)">{{ __('刪除') }}</button>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>文字題目</label>
                        <span class="f-info">(如為填空，請用_取代，例如: apple 為填空答案，請填寫五個下底線_____)</span>
                        <input class="form-control" type="text" placeholder="{{ __('文字題目') }}" v-model="contents[index].text" autofocus>
                      </div>
                      <div class="form-group">
                        <label>音檔</label>
                        <input class="form-control" type="file" accept="audio/*" placeholder="{{ __('音檔') }}" name="'media[]'" :keyindex="index" keyname="media" autofocus @change="onFileChange">
                      </div>
                      <div class="form-group">
                        <label>圖片</label>
                        <input class="form-control" type="file" accept="image/*" placeholder="{{ __('圖片') }}" name="'image[]" :keyindex="index" keyname="image" autofocus @change="onFileChange">
                      </div>
                      <div v-if="item.type == 1 && item.children.length > 0">
                        <div v-for="(item2, index2) in item.children">
                          <div class="d-flex justify-content-between">
                            <div>
                              <h3>@{{index + 1 + '-' + parseInt(index2 + 1)}}.</h3>
                            </div>
                            <div class="d-flex">
                              <div>
                                <button class="btn btn-block btn-outline-danger" @click="deleteQ(2, index, index2)">{{ __('刪除') }}</button>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>文字題目</label>
                            <span class="f-info">(如為填空，請用_取代，例如: apple 為填空答案，請填寫五個下底線_____)</span>
                            <input class="form-control" type="text" placeholder="{{ __('文字題目') }}" v-model="contents[index].children[index2].text" autofocus>
                          </div>
                          <div class="form-group">
                            <label>音檔</label>
                            <input class="form-control" type="file" accept="audio/*" placeholder="{{ __('音檔') }}" name="'media[]" :keyindex="index" :keyindex2="index2" keyname="media" autofocus @change="onFileChange">
                          </div>
                          <div class="form-group">
                            <label>圖片</label>
                            <input class="form-control" type="file" accept="image/*" placeholder="{{ __('圖片') }}" name="'image[]" :keyindex="index" :keyindex2="index2" keyname="image" autofocus @change="onFileChange">
                          </div>
                          <div class="form-group">
                            <label>題目類型</label>
                            <select class="form-control" v-model="contents[index].children[index2].qType" placeholder="請選擇">
                                @foreach($topicTypes as $type)
                                  <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group" v-if="contents[index].children[index2].qType == 1">
                            <label>選項</label>
                            <span class="f-info">(選項請用+分隔，例如：happy+glad+joyful+excited，則會顯示A:happy B:glad C:joyful D:excited)</span>
                            <input class="form-control" type="text" placeholder="{{ __('選項') }}" v-model="contents[index].children[index2].options" autofocus>
                          </div>
                          <div class="form-group">
                            <label>答案</label>
                            <span class="f-info">(請填寫實際答案，例如：happy)</span>
                            <input class="form-control" type="text" placeholder="{{ __('答案') }}" v-model="contents[index].children[index2].answer" autofocus>
                          </div>
                          <div class="form-group">
                            <label style="color: lightcoral; font-weight: bold;">配分</label>
                            <span class="f-info">(請填寫正數或小數點配分)</span>
                            <input class="form-control" type="text" placeholder="{{ __('配分') }}" v-model="contents[index].children[index2].score" onkeyup="value=value.replace(/[^\d.]/g,'')" autofocus>
                          </div>
                        </div>
                      </div>
                      <div v-if="item.type == 2" class="form-group">
                        <label>題目類型</label>
                        <select class="form-control" v-model="contents[index].qType" placeholder="請選擇">
                            @foreach($topicTypes as $type)
                              <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div v-if="item.type == 2 && item.qType == 1" class="form-group">
                        <label>選項</label>
                        <span class="f-info">(選項請用+分隔，例如：happy+glad+joyful+excited，則會顯示A:happy B:glad C:joyful D:excited)</span>
                        <input class="form-control" type="text" placeholder="{{ __('選項') }}" v-model="contents[index].options" autofocus>
                      </div>
                      <div v-if="item.type == 2" class="form-group">
                        <label>答案</label>
                        <span class="f-info">(請填寫實際答案，例如：happy)</span>
                        <input class="form-control" type="text" placeholder="{{ __('答案') }}" v-model="contents[index].answer" autofocus>
                      </div>
                      <div v-if="item.type == 2" class="form-group">
                        <label style="color: lightcoral; font-weight: bold;">配分</label>
                        <span class="f-info">(請填寫正數或小數點配分)</span>
                        <input class="form-control" type="text" placeholder="{{ __('配分') }}" v-model="contents[index].score" onkeyup="value=value.replace(/[^\d.]/g,'')" autofocus>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</form>
@endsection

@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
<script>
  var app = new Vue({
    el: '#app',
    data: {
      first_cat_id: "",
      second_cat_id: "",
      third_cat_id: "",
      third_cat_alias: "",
      type: 0,
      first_categories: [],
      second_categories: [],
      third_categories: [],
      name: "",
      contents: [],
      types: ['T0 - 未分類','T1 - 檢定用','T2 - 比賽用','T3 - 期中考或期末考','T4 - 段考或複習考','T5 - 小考']
    },
    created() {
      this.first_categories = @json($first_categories);
      this.first_cat_id = this.first_categories[0].id;
      this.second_categories = this.first_categories[0].second_categories;
      this.second_cat_id = this.first_categories[0].second_categories[0].id;
      this.third_categories = this.second_categories[0].third_categories;
      if(this.third_categories.length > 0){
        this.third_cat_id = this.second_categories[0].third_categories[0].id;
        this.third_cat_alias = this.second_categories[0].third_categories[0].alias;
      }
    },
    computed: {
      genAliasName: function(){
        let alias = "";
        const $this = this
        this.first_categories.forEach(function(item){
          if(item.id == $this.first_cat_id){
            alias += item.alias;
          }
        });
        if(this.second_categories.length > 0){
          alias += '-' + this.second_categories[0].name
        }
        if(this.third_categories.length > 0){
          alias += '-' + this.third_categories[0].name
        }
        alias += '-' + this.name
        return alias
      },
      contentStringify: function(){
        return JSON.stringify(this.contents)
      }
    },
    methods: {
      changeFirstCat(){
        const first_cat_id = this.first_cat_id;
        let second_categories = [];
        let third_categories = [];
        this.first_categories.forEach(function(item){
          if(item.id == first_cat_id){
            second_categories = item.second_categories;
          }
        });
        this.second_categories = second_categories;
        this.second_cat_id = this.second_categories[0].id;

        this.second_categories.forEach(function(item){
          if(item.first_cat_id == first_cat_id && item.third_categories.length > 0){
            third_categories = item.third_categories;
          }
        });
        this.third_categories = third_categories;
        if(this.third_categories.length > 0){
          this.third_cat_id = this.third_categories[0].id;
        }
      },
      changeSecondCat(){
        const second_cat_id = this.second_cat_id;
        let third_categories = [];
        this.second_categories.forEach(function(item){
          if(item.id == second_cat_id && item.third_categories.length > 0){
            third_categories = item.third_categories;
          }
        });
        this.third_categories = third_categories;
        if(this.third_categories.length > 0){
          this.third_cat_id = this.third_categories[0].id;
        }
      },
      insertQ(type){
        let object = {
          text: '',
          media: '',
          image: '',
          qType: 1,
        }
        // type1:題組 type2:單題
        if(type == 1){
          object.type = 1
          object.children = []
        }else{
          object.type = 2
          object.options = ''
          object.answer = ''
          object.score = 0
        }
        this.contents.push(object)
      },
      deleteQ(type, index, child_index = null){
        if(type == 1){
          this.contents.splice(index, 1);
        }
        if(type == 2){
          this.contents[index].children.splice(child_index, 1);
        }
      },
      insertChildQ(index){
        this.contents[index].children.push({
          text: '',
          media: '',
          image: '',
          qType: 1,
          options: '',
          answer: '',
          score: 0
        })
      },
      onFileChange(e) {
        var files = e.target.files || e.dataTransfer.files;
        if (!files.length)
          return;
        this.createImage(files[0]);
        var index = parseInt(e.target.getAttribute("keyindex"));
        var index2 = parseInt(e.target.getAttribute("keyindex2"));
        var name = e.target.getAttribute("keyname");

        if(index2 >= 0){
          this.contents[index].children[index2][name] = files[0].name;
        }else{
          this.contents[index][name] = files[0].name;
        }
      },
      createImage(file) {
        var image = new Image();
        var reader = new FileReader();
        var vm = this;

        reader.onload = (e) => {
          vm.image = e.target.result;
        };
        reader.readAsDataURL(file);
        // console.log(vm.image)
      }
    },
  });
</script>
@endsection

@section('css')
<style>
  .f-danger {
    color: red;
  }
  .f-warning {
    color: orange;
  }
  .f-info {
    color: #39f;
  }
</style>
@endsection