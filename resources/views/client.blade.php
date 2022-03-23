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

                <h3> Your clients</h3>

                @forelse ($clients as $client)
                    <div class="card mt-2">
                        <div class="card-header">{{ 'Client nr. ' . $loop->index + 1 }}</div>
                        <div class="card-body">
                            <p><b>Client Id: </b>{{ $client->id }}</p>
                            <p><b>Client name: </b>{{ $client->name }}</p>
                            <p><b>Client secret: </b>{{ $client->secret }}</p>
                            <p><b>Client provider: </b>{{ $client->provider ?? 'Not set' }}</p>
                            <p><b>Redirect: </b>{{ $client->redirect }}</p>
                            <p><b>Personal access client: </b>{{ $client->personal_access_client ?? 'Not set' }}</p>
                            <p><b>Password client: </b>{{ $client->password_client ?? 'Not set' }}</p>
                            <p><b>Revoked: </b>{{ $client->revoked ?? 'Not set' }}</p>
                            <p><b>Created at: </b>{{ $client->created_at }}</p>
                            <p><b>Updated at: </b>{{ $client->updated_at }}</p>



                        </div>
                    </div>
                @empty
                    <p>You have no active clients</p>
                @endforelse
            </div>
        </div>

        {{-- create a client --}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Create a new client</div>
                    <div class="card-body">
                        <form action="/oauth/clients" method="POST">
                            <div>
                                <label for="name" class="form-label">Client name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="mt-3">
                                <label for="redirect" class="form-label">Redirect url</label>
                                <input  type="text" name="redirect" id="redirect" class="form-control"
                                        placeholder=" Ex: http://your-app-url.test/callback"
                                        aria-describedby="nameHelp">
                                <div id="nameHelp" class="form-text">The url where the client is send back to, after it is authentificated in this application.</div>
                            </div>
                            <div class="d-flex">
                                @csrf
                                <button type="submit" class="btn btn-primary mt-4 ms-auto">Create client</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
