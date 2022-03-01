@extends('layouts.app')

@section('content')

    <div class="introduction">
        <div class="introduction__item container">
            <h1 class="introduction__title">{{ isset($category) ? (__('admin/admin.title_change') . ' "' . $category->title . '"') :  __('admin/admin.title_add') }}</h1>
        </div>
    </div>
    <div class="page__body container">
        <div class="mt-8">
            <form class="space-y-5 mt-5" method="POST"
                  action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}">
                @csrf

                @if(isset($category))
                    @method('PUT')
                @endif

                <input name="title" type="text"
                       class="w-full h-12 border border-gray-800 rounded px-3 @error('title') border-red-500 @enderror"
                       placeholder="{{__('admin/admin.placeholder_name')}}" value="{{ $category->title ?? '' }}"/>

                @error('title')
                <p class="text-red-500">{{ $message }}</p>
                @enderror


                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium"
                        value="save">
                    {{__('admin/buttons.button_save')}}
                </button>
            </form>
        </div>

        <div class="transition">
            <a href="{{route('category.index')}}" class="transition-button">
                <span class="transition-button__text">{{__('admin/buttons.button_back')}}</span>
            </a>
        </div>
    </div>

@endsection
