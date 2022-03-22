@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @forelse ($clients as $client)
                    <div class="card">
                        <div class="card-header">{{  'Client nr. '.$loop->index+1 }}</div>
                        <div class="card-body">
                            <p><b>Client Id: </b>{{ $client->id }}</p>
                            <p><b>Client name: </b>{{ $client->name }}</p>
                            <p><b>Client provider: </b>{{ $client->provider??'Not set' }}</p>
                            <p><b>Redirect: </b>{{ $client->redirect }}</p>
                            <p><b>Personal access client: </b>{{ $client->personal_access_client??'Not set' }}</p>
                            <p><b>Password client: </b>{{ $client->password_client??'Not set' }}</p>
                            <p><b>Revoked: </b>{{ $client->revoked??'Not set' }}</p>
                            <p><b>Created at: </b>{{ $client->created_at }}</p>
                            <p><b>Updated at: </b>{{ $client->updated_at }}</p>
                        </div>
                    </div>
                @empty
                    <p>You have no active clients</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
