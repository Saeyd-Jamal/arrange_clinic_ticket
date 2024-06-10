@extends('layout')
@section('styles')
@endsection
@section('contant')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>جدول الأطباء
                <div class="card-header-right">
                    <a href="{{route('profile.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> إضافة طبيب جديد</a>
                </div>
            </div>
            <div class="card-block">
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الطبيب</th>
                            <th>العيادة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctors as $doctor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{route('profile.edit',$doctor->id)}}" class="nax-item">{{ $doctor->name }}</a></td>
                            <td>{{ $doctor->clinic->clinic_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/col-->
</div>
@endsection
@section('scripts')
<script>
    const csrf_token = "{{ csrf_token() }}";
</script>
<script src="{{asset('js/script.js')}}" ></script>
@endsection
