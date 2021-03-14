@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        @forelse($subscribers as $subscriber)
                            <li>{{ $subscriber->email }}</li>
                        @empty
                            <p>No subscribers yet</p>
                        @endforelse
                    </ul>

                    <form action="{{ route('subscribers.send_email') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Send Email</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
