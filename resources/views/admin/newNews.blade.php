@extends('layouts.app')

@section('content')

    <div class="introduction">
        <div class="introduction__item container">
            <h1 class="introduction__title">{{ isset($news) ? (__('admin/admin.title_edit_news') . ' "' . $news->title . '"') :  __('admin/admin.title_add_news') }}</h1>
        </div>
    </div>
    <div class="page__body container">
        <div class="mt-8">
            <form class="space-y-5 mt-5" method="POST"
                  action="{{ isset($news) ? route('news.update', $news->id) : route('news.store') }}">
                @csrf

                @if(isset($news))
                    @method('PUT')
                @endif

                @if(is_int($category))
                    <input hidden type="checkbox" name="category_id" value="{{$category}}" checked>
                @else
                    <select name="category_id" class="w-full h-12 border border-gray-800 rounded px-3">
                        <option disabled>{{__('option_select_category')}}</option>
                        @foreach($category as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach
                    </select>


                @endif


                <input name="title" type="text"
                       class="w-full h-12 border border-gray-800 rounded px-3 @error('title') border-red-500 @enderror"
                       placeholder="{{__('admin/admin.placeholder_name')}}" value="{{ $news->title ?? '' }}"/>

                @error('title')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input name="description" type="text"
                       class="w-full h-12 border border-gray-800 rounded px-3 @error('description') border-red-500 @enderror"
                       placeholder="{{__('admin/admin.placeholder_description')}}"
                       value="{{ $news->description ?? '' }}"/>

                @error('description')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <textarea name="news_body"
                          class="w-full h-12 border border-gray-800 rounded px-3 @error('news_body') border-red-500 @enderror"
                          placeholder="{{__('admin/admin.placeholder_text')}}"
                >{{ $news->news_body ?? '' }}</textarea>

                @error('news_body')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input type="date" name="publish_date">

                @error('publish_date')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium"
                        value="save">
                    {{__('admin/buttons.button_save')}}
                </button>
            </form>
        </div>

        <div class="transition">
            <a href="{{$route}}" class="transition-button">
                <span class="transition-button__text">{{$title_button}}</span>
            </a>
        </div>
    </div>

@endsection
