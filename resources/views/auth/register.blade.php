<div>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <label for="first_name"> Имя
            @error('first_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text"
                   placeholder="Введите имя"
                   name="first_name"
                   id="name"
                   value="{{ old('first_name') }}"
                   autofocus>
        </label>
        <label for="last_name">
            Фамилия
            @error('last_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text"
                   placeholder="Введите фамилию"
                   name="last_name"
                   id="last_name"
                   value="{{ old('last_name') }}">
        </label>
        <label for="email">
            Почта
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="email"
                   placeholder="Введите почту"
                   name="email"
                   id="email"
                   value="{{ old('email') }}">
        </label>
        <label for="password">
            Пароль
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="password"
                   placeholder="Введите пароль"
                   name="password"
                   id="password">
        </label>
        <label for="password_confirmation">
            Пароль
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="password"
                   placeholder="Введите пароль повторно"
                   name="password_confirmation"
                   id="password_confirmation">
        </label>
        <button type="submit">Регистрация</button>
    </form>
</div>
