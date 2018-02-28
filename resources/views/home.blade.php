@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Уведомления:</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div id="app">
                            <vue-simple-notify :items="items"></vue-simple-notify>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
