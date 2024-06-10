@extends('layout')
@section('styles')
@endsection
@section('contant')
    <div class="main-content app-content">
        <!-- container -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mg-b-20">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('getClinicView')}}">
                                @csrf
                            <div class="row">
                                <div class="form-group">
                                    <label>طريقة العرض</label>
                                    <select class="form-control mr-2 ml-2 col-md-4" id="num_clinics" name="num_clinics">
                                        <option value="null">اختر عدد العيادات التي تريد اضافتها في العرض</option>
                                        <option value="1">عيادة واحدة</option>
                                        <option value="2">عيادتان</option>
                                        <option value="4">اربع عيادات</option>
                                    </select>
                                </div>
                                <hr style="width: 100%; opacity: 30%;  box-sizing: border-box;" class="border d-block border-primary border-1">
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>عيادة رقم 1</label>
                                    <select class="form-control mr-2 ml-2 col-md-4" id="clinic1" name="clinic1">
                                        <option value="null">اختر عيادة رقم 1</option>
                                        @foreach ($clinics as $clinic)
                                            <option value="{{ $clinic['id'] }}">
                                                {{ $clinic['clinic_name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <hr style="width: 100%; opacity: 30%;  box-sizing: border-box;" class="border d-block border-primary border-1">
                                <div class="form-group">
                                    <label>عيادة رقم 2</label>
                                    <select class="form-control mr-2 ml-2 col-md-4" id="clinic2" name="clinic2">
                                        <option value="null">اختر عيادة رقم 2</option>
                                        @foreach ($clinics as $clinic)
                                            <option value="{{ $clinic['id'] }}">
                                                {{ $clinic['clinic_name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <hr style="width: 100%; opacity: 30%;  box-sizing: border-box;" class="border d-block border-primary border-1">
                                <div class="form-group">
                                    <label>عيادة رقم 3</label>
                                    <select class="form-control mr-2 ml-2 col-md-4" id="clinic3" name="clinic3">
                                        <option value="null">اختر عيادة رقم 3</option>
                                        @foreach ($clinics as $clinic)
                                            <option value="{{ $clinic['id'] }}">
                                                {{ $clinic['clinic_name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <hr style="width: 100%; opacity: 30%;  box-sizing: border-box;" class="border d-block border-primary border-1">
                                <div class="form-group">
                                    <label>عيادة رقم 4</label>
                                    <select class="form-control mr-2 ml-2 col-md-4" id="clinic4" name="clinic4">
                                        <option value="null">اختر عيادة رقم 4</option>
                                        @foreach ($clinics as $clinic)
                                            <option value="{{ $clinic['id'] }}">
                                                {{ $clinic['clinic_name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <hr style="width: 100%; opacity: 30%;  box-sizing: border-box;" class="border d-block border-primary border-1">
                                <div class="form-group">
                                    <label>اختيار المستشفى</label>
                                    <select class="form-control mr-2 ml-2 col-md-4" id="hospital" name="hospital">
                                        <option value="null">اختر</option>
                                        <option value="yafa">يافا</option>
                                        <option value="ku">الكويتي</option>
                                    </select>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-primary">إرسال</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        const csrf_token = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
