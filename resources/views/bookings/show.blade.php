@extends('layouts.main')

@section('content')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif
    <h1>Номер успешно забронирован</h1>
    <p>В ближайшее время вся необходимая информация будет выслана Вам на почту</p>
@endsection
