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
                        Add New Email Address
                    </div>

                    <div class="card-body">
                        <form action="{{ route('add-email') }}" method="POST">
                            @csrf
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control mb-2"
                                placeholder="Enter Email Address">
                            <input type="submit" value="Add Email Address" class="btn btn-primary w-100">
                        </form>
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
                                @foreach ($collections as $index => $email)
                                    <tr>
                                        <td>{{ $index + $collections->firstItem() }} </td>
                                        <td>{{ $email->email }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-warning">Update</a>
                                            <a href="" class="btn btn-sm btn-danger">Delete</a>
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
        <hr>
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
                        Create New Email
                    </div>

                    <div class="card-body">
                        <form action="{{ route('make-email') }}" method="POST">
                            @csrf
                            <label for="title">Email Title</label>
                            <input type="text" name="title" id="title" class="form-control mb-2"
                                placeholder="Enter Email Title">
                            <label for="body">Email Body</label>
                            <textarea type="text" name="body" id="body" class="form-control mb-2"
                                placeholder="Enter Email Title" cols="30" rows="10"></textarea>
                            <input type="submit" value="Create Email" class="btn btn-primary w-100">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Email List
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Email Title</th>
                                    <th>Email Body</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($emails as $index => $email)
                                    <tr>
                                        <td>{{ $index + $emails->firstItem() }} </td>
                                        <td>{{ $email->title }}</td>
                                        <td><a href="">{{ Str::limit($email->body, 30, $end='...')}}</a></td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-warning">Update</a>
                                            <a href="" class="btn btn-sm btn-danger">Delete</a>
                                            <a href="{{route('send-email', $email->id)}}" class="btn btn-sm btn-info">Send Mail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        {{ $emails->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
