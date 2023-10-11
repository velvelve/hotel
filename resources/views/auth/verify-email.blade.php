<div>
    @if(session('message'))
        <p> {{ session('status') }}</p>
    @endif
    <form action="{{ route('verification.send') }}" method="post">
        @csrf
        <span>Пожалуйста, подтвердите почту.</span>
        <br>
        <span>Отправить письмо для подтверждения снова</span>
        <button type="submit">
            ->
        </button>
    </form>
</div>
