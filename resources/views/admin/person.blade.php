@extends('layouts.app')

@section('content')
    <div class="introduction">
        <div class="introduction__item container">
            <h1 class="introduction__title">{{__('admin/admin.title_person')}}</h1>
        </div>
    </div>

    <div class="page__body container">
        <a href="{{ route('person.create') }}" class="transition-button">
            <span class="transition-button__text">{{ __('admin/buttons.button_add') }}</span>
        </a>
        <section class="news">
            @foreach($person as $user)
                <div class="block-news">
                    <h2>{{$user->name}}</h2>
                    @if(!empty($user->getRoleNames()))
                        <p>{{ $user->getRoleNames()[0] }}</p>
                    @endif
                    <div class="action">
                        <a href="{{ route('person.edit', $user->id) }}" class="transition-button">
                            <span class="transition-button__text">{{__('admin/buttons.button_edit')}}</span>
                        </a>

                        <form action="{{ route('person.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="transition-button">{{__('admin/buttons.button_del')}}</button>
                        </form>
                    </div>
                </div>
            @endforeach
                {{ $person->links() }}
        </section>
    </div>
@endsection

