@extends('layouts.app')

@section('content')
    <div class="introduction">
        <div class="introduction__item container">
            <h1 class="introduction__title">{{ $news->title }}</h1>
        </div>
    </div>
    <section class="news">
        <div class="block-news">
            <figure class="block-news__title">
                <div class="block-news__photo">
                    <img class="block-news__photo_image" src="https://picsum.photos/500/300" alt="photo"/>
                </div>
                <figcaption>
                    <h2>{{$news->title}}</h2>
                    <p> {{$news->description}}</p>
                </figcaption>
            </figure>
            <p class="block-news__text">{{$news->news_body}}</p>
        </div>
        @if(Auth::user())
            <form method="get" action="{{route('show_form', $news->id)}}" class="space-y-5 mt-5">
                @csrf

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">
                  {{Auth::user()->name . ', ' . __('buttons.button_share')}}
                </button>
            </form>
        @endif

        <div class="transition">
            <a href="{{route('one_category',$news->category_id)}}" class="transition-button">
                <span class="transition-button__text">{{__('buttons.button_back_section')}}</span>
            </a>
        </div>
        <div class="block-news">
            @if(is_null($comment[0]->comment_body))
                <p class="block-news__text">
                    {{__('page.stub_text_commit')}}
                    {{ Auth::user()? __('page.stub_text_answer_one') : __('page.stub_text_answer_two') }}
                </p>
            @else
                @foreach($comment as $item)
                    <div class="block-news__text">
                        <p>{{$item->comment_body}}</p>
                        <span>{{$item->name}}</span>
                        <span>{{$item->created_at}}</span>
                    </div>
                @endforeach
            @endif
        </div>
@endsection

