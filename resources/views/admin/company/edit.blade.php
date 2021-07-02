@extends('layout.master')
@section('title','Edit|Company')

@section('content')

<div class="pcoded-content">
<div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="feather icon-clipboard bg-c-blue"></i>
                                <div class="d-inline">
                                    <h5>Edit Company</h5>
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
                                <h5></h5>
                                
                              </div>
                              <div class="card-block">
                                <form method="post" action="{{route('updateCompany')}}" id="createCompanyForm">
                                  <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Company Name</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="company_name" id="name" value="{{$compInfo->name}}" placeholder="Company Name">
                                      <input type="hidden" name="id" value="{{$compInfo->id}}">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Contact Number</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" value="{{$compInfo->phone}}" name="contact_number" placeholder="Contact Number">
                                      
                                    </div>
                                  </div>
                                  @csrf
                                  <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                      <input type="email" class="form-control" value="{{$compInfo->email}}" id="email" name="email" placeholder="Enter valid e-mail address">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Web Site</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" value="{{$compInfo->website}}" id="website" name="website" placeholder="https://example.com">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                      <textarea rows="3" name="address" class="form-control" id="address" placeholder="Address">{{$compInfo->address}}</textarea>
                                  
                                    </div>
                                  </div>
                              
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

{!! JsValidator::formRequest('App\Http\Requests\CompanyRequest', '#createCompanyForm') !!}

<script>
function validForm(){
    var form = $("#createCompanyForm");
    if(form.valid()){
        form.submit();
    }
}
</script>
@endsection