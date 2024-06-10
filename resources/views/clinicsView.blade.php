@extends('layout')
@section('styles')
<style type="text/css">
    .boxs{
        display: flex;
        justify-content: space-evenly;
    }
    .vr{
        height: 100vh;
        width: 4px;
        background-color: #3299ec;
        opacity: 41%;
    }
    hr{
        width: 100%;
        height: 5px;
    }

</style>
@if ($hospital == 'yafa')
<style>
    body{
        background-image: url({{asset('img/back-yafa.jpg')}});
    }
</style>
@endif
@if ($hospital == 'ku')
<style>
    body{
        background-image: url({{asset('img/back-ku.jpg')}});
    }
</style>
@endif
@endsection
@section('contant')

{{-- 1 --}}
@if ($num_clinics == 1)
<div class="div" style="display: none;">
    <div class="boxs">
        <div class="box-1 clinic">
            <div class="box-2">
                <h1 class="title-clinic"> {{$clinic1['clinic_name']}}</h1>
                <input type="hidden" id="clinic1" value="{{$clinic1['id']}}">
                <div class="box-num" id="clinicbox_1">
                    {{$clinic1['num_ticket']}}
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if ($num_clinics == 2)
<div class="div"  style="display: none;">
    <div class="boxs">
        <div class="box-1 clinic">
            <div class="box-2">
                <h1 class="title-clinic"> {{$clinic1['clinic_name']}}</h1>
                <input type="hidden" id="clinic1" value="{{$clinic1['id']}}">
                <div class="box-num" id="clinicbox_1">
                    {{$clinic1['num_ticket']}}
                </div>
            </div>
        </div>
        <div class="vr"></div>
        <div class="box-1 clinic">
            <div class="box-2">
                <h1 class="title-clinic"> {{$clinic2['clinic_name']}}</h1>
                <input type="hidden" id="clinic2" value="{{$clinic2['id']}}">
                <div class="box-num"  id="clinicbox_2">
                    {{$clinic2['num_ticket']}}
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if ($num_clinics == 4)
<div class="div" style="display: none;">
    <div class="boxs">
        <div class="row">
            <div class="box-1 clinic" style="height: 50vh">
                <div class="box-2">
                    <h1 class="title-clinic" style="font-size:50px;"> {{$clinic1['clinic_name']}}</h1>
                    <input type="hidden" id="clinic1" value="{{$clinic1['id']}}">
                    <div class="box-num" id="clinicbox_1">
                        {{$clinic1['num_ticket']}}
                    </div>
                    <hr>
                </div>
            </div>
            <div class="box-1 clinic" style="height: 50vh">
                <div class="box-2">
                    <h1 class="title-clinic" style="font-size:50px;"> {{$clinic2['clinic_name']}}</h1>
                    <input type="hidden" id="clinic2" value="{{$clinic2['id']}}">
                    <div class="box-num" id="clinicbox_2">
                        {{$clinic2['num_ticket']}}
                    </div>
                </div>
            </div>
        </div>
        <div class="vr"></div>
        <div class="row">
            <div class="box-1 clinic" style="height: 50vh">
                <div class="box-2">
                    <h1 class="title-clinic" style="font-size:50px;"> {{$clinic3['clinic_name']}}</h1>
                    <input type="hidden" id="clinic3" value="{{$clinic3['id']}}">
                    <div class="box-num" id="clinicbox_3">
                        {{$clinic3['num_ticket']}}
                    </div>
                    <hr>
                </div>
            </div>
            <div class="box-1 clinic" style="height: 50vh">
                <div class="box-2">
                    <h1 class="title-clinic" style="font-size:50px;"> {{$clinic4['clinic_name']}}</h1>
                    <input type="hidden" id="clinic4" value="{{$clinic4['id']}}">
                    <div class="box-num" id="clinicbox_4">
                        {{$clinic4['num_ticket']}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif
<button class="btn btn-info" id="palyBtn" onclick="palyBtn();">play</button>
<audio id="tik" controls style="display: none;">
    <source src="{{asset('sw.wav')}}" type="audio/mpeg">
</audio>
@endsection
@section('scripts')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script>
    const csrf_token = "{{ csrf_token() }}";
    let num_clinics = {{ $num_clinics }};

</script>

<script src="{{asset('js/ajaxView.js')}}" ></script>
@endsection

