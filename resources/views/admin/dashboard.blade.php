@extends('layout.master')
@section('title','Dashboard')

@section('content')

<div class="pcoded-content">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header card">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="feather icon-home bg-c-blue"></i>
                                        <div class="d-inline">
                                            <h5>Dashboard</h5>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index-2.html"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <!-- [ page content ] start -->
                                        <div class="row">
                            <div class="col-12">
                            <div class="card">
                              <div class="card-header">
                                <h5>Awards To Company</h5>
                                
                              </div>
                              <div class="card-block">
                                <form id="CompanyAwardForm" action="{{route('assignAward')}}" method="post" novalidate="">
                                @csrf
                                  <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Company</label>
                                    <div class="col-sm-10">
                                      <select name="company" class="form-control js-example-disabled-results

">
                                      <option value="">Select Company</option>
                                      @foreach($companies as $v)
                                      <option value="{{$v->id}}">{{$v->name}}</option>
                                      @endforeach
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Award</label>
                                    <div class="col-sm-10">
                                    <select name="award" class="form-control js-example-disabled-results

">
                                      <option value="">Select Award</option>
                                      @foreach($awardes as $v)
                                      <option value="{{$v->id}}">{{$v->name}}</option>
                                      @endforeach
                                      </select>
                                      <span class="messages popover-valid"></span>
                                    </div>
                                  </div><br>
                                  <div class="row">
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

                            <div class="row">
                            <div class="col-12">
                            <div class="card">
                          <div class="card-header">
                            <h5>Company Awards</h5>
                          </div>
                          <div class="card-block">
                            <div class="table-responsive dt-responsive">
                              <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                  <tr>
                                    <th>Company Name</th>
                                    <th>Award Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  
                                  </tr>
                                </thead>
                                <tbody>
                                @if($compAwards->count() > 0)
                                @foreach($compAwards as $key => $v)
                                  <tr>
                                    <td>{{$v->company->name}}</td>
                                    <td>{{$v->award->name}}</td>
                                    <td><select name="select" id="stsdrop_{{$key}}" onchange="assignChangeSts('{{$v->id}}',this.value,this.id)" class="form-control form-control-{{$v->status == 0 ?'success' : 'danger'}} fill">
                                    <option value="0" {{$v->status == 0 ? 'selected' : ''}}>Active</option>
                                    <option value="1" {{$v->status == 1 ? 'selected' : ''}}>Inactive</option>
                                    </select></td>
                                    <td><a href="{{route('assignCodeDownload',$v->assign_code)}}" title="Download Logo Code"><i class="fa fa-download"></i></a></td>
                                  </tr>
                                 @endforeach
                                 @endif
                                </tbody>
                              </table>
                            </div>
                            <span style="float: right">
                              @if($compAwards->count() > 0)
                              {{$compAwards->links()}}
                              @endif
                              </span>
                          </div>
                        </div>
                        </div>
                            </div>
                                        <!-- [ page content ] end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
  @endsection

  @section('scripts')

<script type="text/javascript" src="{{ asset('public/vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\CompanyAwardRequest', '#CompanyAwardForm') !!}

<script>

function validForm(){
    var form = $("#CompanyAwardForm");
    if(form.valid()){
        form.submit();
    }
}
</script>
<script>
  function assignChangeSts(assignId, value,id){
    $.ajax({
        url: "{{route('changeStsAssignAward')}}",
        type: "POST",
        dataType:"JSON",
        data: {"assign_id":assignId,"value":value,"_token":"{{csrf_token()}}"},
        success:function(res){
            if(res.status == true){
                if(value == 0){
                    $("#"+id).attr('class','form-control form-control-success fill');
                }else{
                    $("#"+id).attr('class','form-control form-control-danger fill');
                }
                toastr.success(res.message);
            }else{
                toastr.error(res.message);
            }
        }
    });
}
</script>
@endsection                  