@extends('layout')
@section('styles')
@endsection
@section('contant')
@if (Auth::user()->type == "doctor")
<div class="box-1">
    <div class="box-2">
        <h1 class="title-clinic" data-name="{{$clinic[0]['id']}}">عيادة {{$clinic[0]['clinic_name']}}</h1>
        <div class="box-num" id="num_box">
            {{$clinic[0]['num_ticket']}}
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <button type="button" id="plus" class="btn btn-success ms-2">+</button>
            <input type="number" min="1" id="num_inp" value="{{$clinic[0]['num_ticket']}}">
            <button type="button" id="minus" class="btn btn-danger me-2">-</button>
        </div>
    </div>
</div>
@endif
@endsection
@section('scripts')
<script>
    const csrf_token = "{{ csrf_token() }}";
</script>
<script src="{{asset('js/script.js')}}" ></script>
@endsection
