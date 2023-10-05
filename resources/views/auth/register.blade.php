<div>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <label for="first_name" style="{{ $errors->has('first_name') ? 'color: red' : ''}}"> Имя
            <input type="text"
                   placeholder="Введите имя"
                   name="first_name"
                   id="name"
                   value="{{ old('first_name') }}"
                   autofocus>
            @error('first_name')
            <span style="color: red"> {{ $message }}</span>
            @enderror
        </label>
        <label for="last_name">
            Фамилия
            <input type="text"
                   placeholder="Введите фамилию"
                   name="last_name"
                   id="last_name"
                   value="{{ old('last_name') }}">
        </label>
        <label for="email">
            Почта
            <input type="email"
                   placeholder="Введите почту"
                   name="email"
                   id="email"
                   value="{{ old('email') }}">
        </label>
        <label for="password">
            Пароль
            <input type="password"
                   placeholder="Введите пароль"
                   name="password"
                   id="password">
        </label>
        <label for="password_confirmation">
            Пароль
            <input type="password"
                   placeholder="Введите пароль"
                   name="password_confirmation"
                   id="password_confirmation">
        </label>
        <button type="submit">Регистрация</button>
    </form>
</div>
