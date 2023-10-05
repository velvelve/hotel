<div>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <label for="email">
            Почта
            <input type="email"
                   placeholder="Введите почту"
                   name="email"
                   id="email"
                   value="{{ old('email') }}"
                   autofocus>
            @error('email')
            <span style="color: red"> {{ $message }}</span>
            @enderror
        </label>
        <label for="password">
            Пароль
            <input type="password"
                   placeholder="Введите пароль"
                   name="password"
                   id="password">
        </label>
        <label for="remember">Запомнить меня</label><input type="checkbox" id="remember" name="remember">
        <button type="submit">Войти</button>
    </form>
</div>
