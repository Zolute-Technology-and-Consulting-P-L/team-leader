@extends('layout.master')
@section('title')
@if(isset($entity)) Edit|entity @else Create|Entity  @endif
@endsection
@section('content')

<div class="pcoded-content">
<div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="feather icon-clipboard bg-c-blue"></i>
                                <div class="d-inline">
                                    <h5>{{ isset($entity) ? 'Edit Entity' : 'Add New Entity'}}</h5>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
    
   
                <div class="pcoded-inner-content">
                  <div class="main-body">
                    <div class="page-wrapper">
                      <!-- Page body start -->
                      <div class="page-body">
                        <div class="row">
                          <div class="col-sm-12">
                            <!-- Basic Inputs Validation start -->
                            <div class="card">
                              <div class="card-header">
                              </div>
                              <div class="card-block">
                                <form method="post" action="{{route('entityStore')}}" id="createEntityForm">
                                  <input type="hidden" name="id" value="{{$entity->id ?? ''}}" />
                                  <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Entity Name</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="entity_name" id="name" placeholder="Entity Name" value="{{ ($entity->name) ?? ''}}">
                                      
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Web Site</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="website" id="website" placeholder="https://example.com" value="{{$entity->website ?? ''}}">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Success Page Url</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="success_url"  placeholder="https://example.com/success" value="{{$entity->success_page ?? ''}}">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Failed Page Url</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="failed_url" id="website" placeholder="https://example.com/failed" value="{{$entity->failed_page ?? ''}}">
                                    </div>
                                  </div>
                                  @csrf
                                  <div class="form-group row">
                                    <label class="col-sm-2"></label>
                                    <div class="col-sm-10">
                                      <button type="button" onclick="validForm()" class="btn btn-primary m-b-0">Submit</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                        
                        </div>
                      </div>
                    </div>
                    <!-- Page body end -->
                  </div>
                </div>
              </div>
            </div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('public/vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\EntityRequest', '#createEntityForm') !!}


<script>
function validForm(){
    var Form = $('#createEntityForm');
    if(Form.valid()){
        Form.submit();
    }
}
</script>
@endsection