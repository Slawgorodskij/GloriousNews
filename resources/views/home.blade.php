@extends('layouts.app')

@section('content')
    <div class="introduction">
        <div class="introduction__item container">
            <h1 class="introduction__title">{{__('page.title_home')}}</h1>
        </div>
    </div>
    <div class="deal container">
        <p class="deal-item__layer_title">{{__('page.text_home')}}</p>
        <div class=" deal-items">
            @foreach($categories as $category)
                <div class="deal-items__item deal-item">
                    <img class="deal-item__photo" src="https://picsum.photos/250/250" alt="photo"/>
                    <a class="deal-item__layer" href="{{route('one_category', $category->id)}}">
                        <h2 class="deal-item__layer_title">{{$category['title']}}</h2>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="transition">
        <a href="{{route('all_category')}}" class="transition-button">
            <span class="transition-button__text">{{__('buttons.button_transition')}}</span>
        </a>
    </div>
@endsection
