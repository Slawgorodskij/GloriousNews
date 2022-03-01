@extends('layouts.app')

@section('content')
    <div class="introduction">
        <div class="introduction__item container">
            <h1 class="introduction__title">{{ $title }}</h1>
        </div>
    </div>
    <section class="visual">
        @forelse ($list_news as $news)
            <figure class="visual-block">
                <div class="visual-block__photo">
                    <img class="visual-block__photo_image" src="https://picsum.photos/250/300" alt="photo"/>
                </div>
                <figcaption class="visual-block__text">
                    <a href="{{isset($news->news_body)
                              ? route('one_news', $news->id)
                              :  $news->source
                              }}" target="_blank">
                        <h2 class="visual-block__text-title">{{$news->title}}</h2>
                    </a>
                    <p> {{$news->description}}</p>
                </figcaption>
            </figure>
        @empty
            <p>{{__('page.stub_text')}}</p>
        @endforelse

        <div class="transition">
            <a href="{{route('all_category')}}" class="transition-button">
                <span class="transition-button__text">{{__('buttons.button_transition')}}</span>
            </a>
        </div>
    </section>
@endsection
