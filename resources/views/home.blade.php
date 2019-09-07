@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <ul>
                        <li><a href="/admin/ticket/">admin</a></li>
                        <li><a href="/customer/ticket/">customer</a></li>
                        <li><a href="/customer/ticket/create">customer create</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
