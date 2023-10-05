@extends('layouts.main')

@section('content')

@include('inc.message')
<form action="{{ route('search.rooms') }}" method="POST">
    @csrf
    <input type="text" name="date_range" id="date_range" required>
    <label for="guest_count">Количество гостей:</label>
    <input type="number" name="guest_count" id="guest_count" required>
    <button type="submit">Искать</button>
    <br>

</form>
<script>
    $(function() {
        $('input[name="date_range"]').daterangepicker({
            autoApply: true,
            opens: 'left',
            minDate: new Date(),
        })
    });
</script>
@endsection