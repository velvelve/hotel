@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/booking/bookings-show.css') }}" rel="stylesheet">
@endpush

@section('content')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif

    <section class="bookings-show">

        <div class="bookings-show__wrapper">

            <div class="bookings-show__logo"></div>

            <div>
                <h2 class="bookings-show__title">Номер успешно забронирован</h2>
                <p class="bookings-show__text">В ближайшее время вся необходимая информация будет выслана Вам на почту</p>

            </div>

            <div>
                <img class="bookings-show__img" src="{{ asset('img\auth\img.png') }}" alt="photo-hotel">
            </div>

        </div>
    </section>
@endsection
