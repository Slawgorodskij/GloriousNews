@extends('layouts.app')

@section('content')
    <div class="introduction">
        <div class="introduction__item container">
            <h1 class="introduction__title">{{ __('admin/admin.title_news') }}</h1>
        </div>
    </div>

    <div class="page__body container">
        <a href="{{ route('news.create') }}" class="transition-button">
            <span class="transition-button__text">{{ __('admin/buttons.button_add') }}</span>
        </a>
        <section class="news">
            @foreach($news as $item)
                <div class="block-news">
                    <a href="{{ route('news.show', $item->id) }}">
                        <h2>{{$item->title}}</h2>
                        <p> {{$item->description}}</p>
                    </a>
                </div>
            @endforeach
            {{ $news->links() }}
        </section>
    </div>
@endsection

