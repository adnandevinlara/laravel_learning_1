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

                    @if (Session::has('status'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ Session::get('status') }}</li>
                            </ul>
                        </div>
                    @endif


                    @if(session()->has('status'))
                        <div class="alert alert -success">
                            {{ session()->get('status') }}
                        </div>
                    @endif


                    @if ($message = Session::get('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif



                   



                    {{ __('Got Notify alert !') }}
                </div>
            </div>
        </div>
    </div>
</div>



@endsection