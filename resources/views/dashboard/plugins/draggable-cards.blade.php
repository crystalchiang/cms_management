@extends('dashboard.base')

@section('css')
   
@endsection

@section('content')

          <div class="container-fluid">
            <div class="fade-in">
              <div class="row">
                <div class="col-md-4">
                  <div class="row dragdrop">
                    <div class="col-md-12">
                      <div class="card card-accent-secondary">
                        <div class="card-header drag">Drag & Drop Card<a class="badge badge-danger" href="https://coreui.io/pro/">CoreUI Pro Component</a></div>
                        <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="card card-accent-primary">
                        <div class="card-header drag">Drag & Drop Card<a class="badge badge-danger" href="https://coreui.io/pro/">CoreUI Pro Component</a></div>
                        <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="row dragdrop">
                    <div class="col-md-12">
                      <div class="card card-accent-success">
                        <div class="card-header drag">Drag & Drop Card<a class="badge badge-danger" href="https://coreui.io/pro/">CoreUI Pro Component</a></div>
                        <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="card card-accent-warning">
                        <div class="card-header drag">Drag & Drop Card<a class="badge badge-danger" href="https://coreui.io/pro/">CoreUI Pro Component</a></div>
                        <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="row dragdrop">
                    <div class="col-md-12">
                      <div class="card card-accent-info">
                        <div class="card-header drag">Drag & Drop Card<a class="badge badge-danger" href="https://coreui.io/pro/">CoreUI Pro Component</a></div>
                        <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="card card-accent-danger">
                        <div class="card-header drag">Drag & Drop Card<a class="badge badge-danger" href="https://coreui.io/pro/">CoreUI Pro Component</a></div>
                        <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/draggable-cards.js') }}"></script>
@endsection
