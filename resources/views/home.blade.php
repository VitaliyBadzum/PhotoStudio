@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div>Заголовок: {{$about->title}}</div>
                <div>Опис: {{$about->description}}</div>
                <div>Заголовок: {{$photoDescription->title}}</div>
                <div>Опис: {{$photoDescription->description}}</div>
                <div>Адресса: {{$contact->address}}</div>
                <div>Телефон: {{$contact->phone}}</div>
                <div>E-mail: {{$contact->email}}</div>
                <div>Замовлення</div>
                @foreach($orders as $order)
                <div><span>Ім'я: {{$order->name}}</span>
                <span>Телефон: {{$order->phone}}</span>
                <span>Дата: {{$order->created_at}}</span></div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
