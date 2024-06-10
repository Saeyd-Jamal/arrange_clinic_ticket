@extends('layout')
@section('styles')
@endsection
@section('contant')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Profile') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        إعدادات ملف الطبيب
                    </h2>
                </header>
                <form method="post" action="{{ route('profile.update', $user->id) }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')
                    <div>
                        <x-input-label for="name" value="الاسم" />
                        <x-text-input id="name" name="name" type="text" class="form-control mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div>
                        <x-input-label for="name" value="اسم المستخدم" />
                        <x-text-input id="username" name="username" type="text" class="form-control mt-1 block w-full" :value="old('username', $user->username)" required />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div>
                        <x-input-label for="update_password_password" value="كلمة السر" />
                        <x-text-input id="update_password_password" name="password" type="password" class="form-control mt-1 block w-full" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="update_password_password" value="العيادة الخاصة به" />
                        <select class="form-control mt-1 block w-full" name="clinic_id">
                            <option value="null"  @selected($user->clinic_id == null)>اختر العيادة</option>\
                            @foreach ($clinics as $clinic)
                                <option value="{{$clinic->id}}" @selected($user->clinic_id == $clinic->id)>{{$clinic->clinic_name}}</option>\
                            @endforeach
                        </select>
                    </div>


            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <div class="mt-6 flex justify-start">
                    <button type="submit" class="btn btn-info mb-3">
                        تعديل بيانات الطبيب
                    </button>
                </div>
            </div>
        </form>
        <form method="post" action="{{route('profile.destroy',$user->id)}}">
            @csrf
            @method('delete')
            <div class="mt-6 flex justify-end">
                <button class="btn btn-danger ms-3">
                    حذف الطبيب
                </button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    const csrf_token = "{{ csrf_token() }}";
</script>
<script src="{{asset('js/script.js')}}" ></script>
@endsection
