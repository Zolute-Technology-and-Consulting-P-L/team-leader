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
                                    <h5>Awards</h5>
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
                            <h5>Awards</h5>
                          </div>
                          <div class="card-block">
                            <div class="table-responsive dt-responsive">
                              <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                  <tr>
                                    <th>Award Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  
                                  </tr>
                                </thead>
                                <tbody>
                                @if($awards->count() > 0)
                                @foreach($awards as $key => $v)
                                  <tr>
                                    <td>{{$v->name}}</td>
                                    <td><select name="select" id="stsdrop_{{$key}}" onchange="changeSts('{{$v->id}}',this.value,this.id)" class="form-control form-control-{{$v->status == 0 ?'success' : 'danger'}} fill">
                                    <option value="0" {{$v->status == 0 ? 'selected' : ''}}>Active</option>
                                    <option value="1" {{$v->status == 1 ? 'selected' : ''}}>Inactive</option>
                                    </select></td>
                                    <td><a href="{{route('editAward',base64_encode($v->id))}}" title="Edit"><i class="fa fa-edit"></i></a>
                                  </tr>
                                 @endforeach
                                 @endif
                                </tbody>
                              </table>
                            </div>
                            <span style="float: right">
                              @if($awards->count() > 0)
                              {{$awards->links()}}
                              @endif
                              </span>
                          </div>
                        </div>
                       
                       
                     
                  
                    
                        <!-- Row Grouping table end -->
                        <!-- Footer Callback table start -->
                      
                       
                        <!-- Custom Toolbar Elements end -->
                        <!-- Row Created Callback table start -->
                      
                        <!-- Row Created Callback table end -->
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
</script>
@endsection