@extends('layout.master')
@section('title','Create|Award')

@section('content')

<div class="pcoded-content">
<div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="feather icon-clipboard bg-c-blue"></i>
                                <div class="d-inline">
                                    <h5>Add New Award</h5>
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
                                <form method="post" action="{{route('storeAward')}}" id="createAwardForm" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Select Entity</label>
                                    <div class="col-sm-10">
                                      <select name="entity" class="form-control select2">
                                        <option value="">Select Entity</option>
                                        @if($entities->count()>0)
                                        @foreach($entities as $v)
                                        <option value="{{$v->id}}">{{$v->name}}</option>
                                        @endforeach
                                        @endif
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Award Name</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="award_name" id="name" placeholder="Award Name">
                                      
                                    </div>
                                  </div>
                                  <input type="hidden" value="null" name="id">
                                  <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Award Logo</label>
                                    <div class="col-sm-10">
                                      <input type="file" class="form-control" name="award_logo" id="award_logo">
                                      
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
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\AwardRequest', '#createAwardForm') !!}


<script>
function validForm(){
    var awardForm = $('#createAwardForm');
    if(awardForm.valid()){
        awardForm.submit();
    }
}
</script>
@endsection