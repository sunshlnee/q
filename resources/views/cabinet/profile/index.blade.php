@extends('layouts.app')

@section('content')
@include ('cabinet.profile._nav')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Профиль</div>
                <div class="card-body">
                    <p>Имя: {{$user->name}}</p>
                    <p>Фамилия: {{$user->last_name ?? 'Отсутствует'}}</p>
                    <p>Почта: {{$user->email}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Изменение(заполните поля, которые хотите изменить)</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('cabinet.profile.edit', $user) }}">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <label for="name" class="col-form-label">Имя</label>
                            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="col-form-label">Фамилия</label>
                            <input id="last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}">
                            @if ($errors->has('last_name'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('last_name') }}</strong></span>
                            @endif
                        </div>
                    
                        <div class="form-group">
                            <label for="email" class="col-form-label">Почта</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">Пароль</label>
                            <input id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif
                        </div>
                    
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection