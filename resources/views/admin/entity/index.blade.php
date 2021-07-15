@extends('layout.master')
@section('title','Rewards')

@section('content')
<div class="pcoded-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="feather icon-inbox bg-c-blue"></i>
                                <div class="d-inline">
                                    <h5>Entities</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- [ breadcrumb ] end -->
                <div class="pcoded-inner-content">
                  <!-- Main-body start -->
                  <div class="main-body">
                    <div class="page-wrapper">
                      <!-- Page-body start -->
                      <div class="page-body">
                        <!-- DOM/Jquery table start -->
                        <div class="card">
                          <div class="card-header">
                            <h5>Entities</h5>
                          </div>
                          <div class="card-block">
                            <div class="table-responsive dt-responsive">
                              <table id="dom-table" class="table table-striped table-bordered nowrap">
                                <thead>
                                  <tr>
                                    <th>Entity Name</th>
                                    <th>Web Site</th>
                                    <th>Success Page</th>
                                    <th>Failed Page</th>
                                    <th>Action</th>
                                  
                                  </tr>
                                </thead>
                                <tbody>
                                @if($entities->count() > 0)
                                @foreach($entities as $key => $v)
                                  <tr>
                                    <td>{{$v->name}}</td>
                                    <td>{{$v->website}}</td>
                                    <td>{{$v->success_page}}</td>
                                    <td>{{$v->failed_page}}</td>
                                    <td><a href="{{route('editEntity',base64_encode($v->id))}}" title="Edit"><i class="fa fa-edit"></i></a>
                                    <!-- &nbsp;&nbsp;<a href="javascript:void(0)" onclick="deleteConfirm(this)" id="{{$v->id}}" title="Delete"><i class="fa fa-trash"></i></a> -->
                                  </tr>
                                 @endforeach
                                 @endif
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                       
                      </div>
                      <!-- Page-body start -->
                    </div>
                  </div>

                  <!-- Main-body end -->
@endsection

@section('scripts')
<script>
function changeSts(awardId,value,id){
    $.ajax({
        url: "{{route('changeStsAward')}}",
        type: "POST",
        dataType:"JSON",
        data: {"award_id":awardId,"value":value,"_token":"{{csrf_token()}}"},
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
        },
        error:function(error){
          toastr.error('Something went wrong!');
        }
    });
}

function deleteConfirm(elem){
  if(confirm('Are sure want to delete ?')){
    elem.href = "{{url('admin/entity/delete/')}}"+'/'+elem.id;
  }
}
</script>
@endsection