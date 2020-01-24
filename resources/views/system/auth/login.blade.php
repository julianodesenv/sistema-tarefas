@extends('system.layouts.app_login')
@section('content')
    <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
        <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
            <div class="panel">
                <div class="panel-body">
                    <div class="brand">
                        <img class="brand-img" src="https://www.agencias3.com.br/assets/site/images/main-logo.png" alt="...">
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group form-material floating" data-plugin="formMaterial">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label class="floating-label">{{ __('E-mail Address') }}</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group form-material floating" data-plugin="formMaterial">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <label class="floating-label">{{ __('Password') }}</label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group clearfix">
                            <div class="checkbox-custom checkbox-inline checkbox-primary checkbox-lg float-left">
                                <input type="checkbox" name="remember" id="inputCheckbox" {{ old('remember') ? 'checked' : '' }}>
                                <label for="inputCheckbox">Lembrar-me</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="float-right" href="{{ route('password.request') }}" title="Esqueceu a senha?">Esqueceu a senha?</a>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Entrar</button>
                    </form>
                </div>
            </div>

            <footer class="page-copyright page-copyright-inverse">
                <div class="social">
                    <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                        <i class="icon bd-instagram" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                        <i class="icon bd-facebook" aria-hidden="true"></i>
                    </a>
                </div>
            </footer>
        </div>
    </div>
@endsection
