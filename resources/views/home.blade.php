@extends('layouts.app')

@section('content')
<div class="p-5">
    <div class="row justify-content-center mb-3">
        <div class="col-12 col-md-3">
            <div class="card">
                <h5 class="card-header"><strong>{{ __('Roles') }}</strong></h5>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <livewire:role-list />
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <div class="card">
                <h5 class="card-header"><strong>{{ __('Employee') }}</strong></h5>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <livewire:employee-list />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection