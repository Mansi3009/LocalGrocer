@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('is_active'))
                        <div class="alert alert-success" role="alert">
                            {{ session('is_active') }}
                        </div>
                    @endif

                    You are in ADMIN Dashboard!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection