@extends('layouts.app')

@section('content')
    <div class="introduction">
        <div class="introduction__item container">
            <h1 class="introduction__title">{{__('admin/admin.title_index')}}</h1>
        </div>
    </div>

    <div class="page__body container-main">
        <h2>{{__('admin/admin.text')}}</h2>

        <div class="block-news">
            <p>{{__('admin/admin.select_category')}}</p>
            <a href="{{ route('category.index') }}" class="transition-button">
                <span class="transition-button__text">{{__('admin/buttons.button_category')}}</span>
            </a>
        </div>
        <div class="block-news">
            <p>{{__('admin/admin.select_news')}}</p>
            <a href="{{ route('news.index') }}" class="transition-button">
                <span class="transition-button__text">{{__('admin/buttons.button_news')}}</span>
            </a>
        </div>
        <div class="block-news">
            <p>{{__('admin/admin.select_person')}}</p>
            <a href="{{ route('person.index') }}" class="transition-button">
                <span class="transition-button__text">{{__('admin/buttons.button_person')}}</span>
            </a>
        </div>
    </div>

@endsection
