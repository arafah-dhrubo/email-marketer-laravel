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
                        <form
                            action="{{ Request::is('edit-address/*') ? route('update-address', $email->id) : route('add-email') }}"
                            method="POST">
                            @csrf
                            <label for="fname">First Name</label>
                            <input type="text" name="first_name" id="fname" class="form-control mb-2"
                                placeholder="Enter First Name" value={{ $address->first_name ?? '' }}>
                            <label for="lname">Last Name</label>
                            <input type="text" name="last_name" id="lname" class="form-control mb-2"
                                placeholder="Enter Last Name" value={{ $address->last_name ?? '' }}>
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control mb-2"
                                placeholder="Enter Email Address" value={{ $address->email_address ?? '' }}>
                            @if (Request::is('edit-address/*'))
                                <input type="submit" value="Update Email Address" class="btn btn-primary w-100">

                            @else
                                <input type="submit" value="Add Email Address" class="btn btn-primary w-100">

                            @endif
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
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collections as $index => $email)
                                    <tr>
                                        <td>{{ $index + $collections->firstItem() }} </td>
                                        <td>{{$email->first_name}} {{$email->last_name}}</td>
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
    </div>
@endsection
