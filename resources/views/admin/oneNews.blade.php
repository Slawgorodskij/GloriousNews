@extends('layouts.app')

@section('content')
    <div class="introduction">
        <div class="introduction__item container">
            <h1 class="introduction__title">{{ $news->title }}</h1>
        </div>
    </div>

    <div class="page__body container">
        <section class="news">
            <div class="block-news">
                <h2>{{$news->title}}</h2>
                <p> {{$news->description}}</p>
                <p class="block-news__text">{{$news->news_body}}</p>
            </div>
            <div class="action">
                <a href="{{ route('news.edit', $news->id) }}" class="transition-button">
                    <span class="transition-button__text">{{__('admin/buttons.button_edit')}}</span>
                </a>

                <form action="{{ route('news.destroy', $news->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="transition-button">{{__('admin/buttons.button_del')}}</button>
                </form>
            </div>

            <div class="transition">
                <a href="{{route('news.index')}}" class="transition-button">
                    <span class="transition-button__text">{{__('admin/buttons.button_back_index')}}</span>
                </a>
            </div>
        </section>
    </div>
@endsection
