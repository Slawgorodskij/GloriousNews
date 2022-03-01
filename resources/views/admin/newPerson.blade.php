@extends('layouts.app')

@section('content')

    <div class="introduction">
        <div class="introduction__item container">
            <h1 class="introduction__title">{{ isset($person) ? (__('admin/admin.title_edit_person') . ' "' . $person->name . '"') :  __('admin/admin.title_add_person') }}</h1>
        </div>
    </div>
    <div class="page__body container">
        <div class="mt-8">
            <form class="space-y-5 mt-5" method="POST"
                  action="{{ isset($person) ? route('person.update', $person->id) : route('person.store') }}">
                @csrf

                @if(isset($person))
                    @method('PUT')
                    <div class="block-news">
                        <h2>{{ __('admin/admin.name_person') . ': ' . $person->name}}</h2>
                        <p>{{__('admin/admin.email_person') . ': ' .$person->email}}</p>
                    </div>
                @else
                    <input name="name" type="text"
                           class="w-full h-12 border border-gray-800 rounded px-3 @error('name') border-red-500 @enderror"
                           placeholder="{{__('admin/admin.placeholder_name_person')}}" value="{{ $person->name ?? '' }}">
                    @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <input name="email" type="email"
                           class="w-full h-12 border border-gray-800 rounded px-3 @error('title') border-red-500 @enderror"
                           placeholder="{{__('admin/admin.placeholder_email')}}" value="{{ $person->email ?? '' }}">
                    @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <input name="password" type="password"
                           class="w-full h-12 border border-gray-800 rounded px-3 @error('title') border-red-500 @enderror"
                           placeholder="{{__('admin/admin.placeholder_password')}}">
                    @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                @endif


                <input name="role" type="text"
                       class="w-full h-12 border border-gray-800 rounded px-3 @error('name') border-red-500 @enderror"
                       placeholder="{{__('admin/admin.placeholder_role')}}"
                       value="{{ isset($person) ? $person->getRoleNames()[0] : '' }}">
                @error('role')
                <p class="text-red-500">{{ $message }}</p>
                @enderror


                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium"
                        value="save">
                    {{__('admin/buttons.button_save')}}
                </button>
            </form>
        </div>

        <div class="transition">
            <a href="{{route('person.index')}}" class="transition-button">
                <span class="transition-button__text">{{__('admin/buttons.button_back')}}</span>
            </a>
        </div>
    </div>

@endsection
