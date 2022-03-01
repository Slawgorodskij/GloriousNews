@extends('layouts.app')

@section('content')
    <div class="introduction">
        <div class="introduction__item container">
            <h1 class="introduction__title">{{ $title }}</h1>
        </div>
    </div>
    <div class="mt-8">
        <form class="space-y-5 mt-5" method="POST"
              action="{{ route('comment') }}">
            @csrf
            <input hidden type="text" name="news_id" value="{{$news_id}}">

            <label> {{__('page.label_comment_body')}}
                <textarea name="comment_body"
                          class="w-full h-12 border border-gray-800 rounded px-3 @error('text') border-red-500 @enderror">
                </textarea>
            </label>


            @error('text')
            <p class="text-red-500">{{ $message }}</p>
            @enderror


            <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">
               {{__('buttons.button_send')}}
            </button>
        </form>
    </div>

    <div class="transition">
        <a href="{{route('one_news', $news_id)}}" class="transition-button">
            <span class="transition-button__text">{{__('buttons.button_back_news')}}</span>
        </a>
    </div>
@endsection
