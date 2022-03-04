<!-- Button trigger modal -->
@if($model->phones)
    @foreach(json_decode($model->phones) as $phone)
        <p>{{$phone}}</p>
    @endforeach
@endif


