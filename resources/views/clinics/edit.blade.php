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
                        اعدادات العيادة
                    </h2>
                </header>
                <form method="post" action="{{ route('clinic.update', $clinic->id) }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')
                    <div>
                        <x-input-label for="clinic_name" value="اسم العيادة" />
                        <x-text-input id="clinic_name" name="clinic_name" type="text" class="form-control mt-1 block w-full" :value="old('clinic_name', $clinic->clinic_name)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('clinic_name')" />
                    </div>
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <div class="mt-6 flex justify-start">
                    <button type="submit" class="btn btn-info mb-3">
                        تعديل بيانات العيادة
                    </button>
                </div>
            </div>
        </form>
        <form method="post" action="{{route('clinic.destroy',$clinic->id)}}">
            @csrf
            @method('delete')
            <div class="mt-6 flex justify-end">
                <button class="btn btn-danger ms-3">
                    حذف العيادة
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
