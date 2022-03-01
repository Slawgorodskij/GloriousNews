@extends('layouts.app')

@section('content')
    <div class="introduction">
        <div class="introduction__item container">
            <h1 class="introduction__title">{{ __('admin/admin.title_categories') }}</h1>
        </div>
    </div>

    <div class="page__body container">
        <a href="{{ route('category.create') }}" class="transition-button">
            <span class="transition-button__text">{{ __('admin/buttons.button_add') }}</span>
        </a>
        <section class="news">
            @foreach($categories as $item)
                <div class="block-news">
                    <h2>{{$item->title}}</h2>
                    <div class="action">
                        <a href="{{ route('category.edit', $item->id) }}" class="transition-button">
                            <span class="transition-button__text">{{__('admin/buttons.button_edit')}}</span>
                        </a>

                        <form action="{{ route('category.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="transition-button">{{__('admin/buttons.button_del')}}</button>
                        </form>
                    </div>
                </div>
            @endforeach
            {{ $categories->links() }}
        </section>
    </div>
@endsection
