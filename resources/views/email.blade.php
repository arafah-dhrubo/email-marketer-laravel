@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="alert alert-success" role="alert">

                </div>
            @endif
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Email To Be Send
                    </div>

                    <div class="card-body">
                        <h4>{{$email->title}}</h4>
                        <p>{{$email->body}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Email Address List
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Email Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collections as $index => $collection)
                                    <tr>
                                        <td>{{ $index + $collections->firstItem() }} </td>
                                        <td>{{ $collection->email }}</td>
                                        <td>
                                            <a href="{{route('send', [$email->id, $collection->id])}}" class="btn btn-sm btn-warning">Send Mail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        {{ $collections->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
