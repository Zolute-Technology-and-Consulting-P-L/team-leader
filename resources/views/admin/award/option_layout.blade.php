<option value="">Select Award</option>
@foreach($awards as $v)
<option value="{{$v->id}}">{{$v->name}}</option>
@endforeach
