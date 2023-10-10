<div>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <label for="email">
            Почта
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="email"
                   placeholder="Введите почту"
                   name="email"
                   id="email"
                   value="{{ old('email') }}"
                   autofocus>
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
        <label for="remember">Запомнить меня</label><input type="checkbox" id="remember" name="remember">
        <button type="submit">Войти</button>
    </form>
</div>
