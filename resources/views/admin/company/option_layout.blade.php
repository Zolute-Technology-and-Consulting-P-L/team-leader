<option value="">Select Company</option>
@if($companies->count()>0)
@foreach($companies as $v)
<option value="{{$v->id}}">{{$v->name}}</option>
@endforeach
@endif