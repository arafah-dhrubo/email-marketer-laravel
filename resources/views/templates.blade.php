@extends('layouts.app')

@section('content')

    <div class="">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="alert alert-success" role="alert">

            </div>
        @endif
        <div class="card mb-3">
            <div class="card-header">
                Create New Email
            </div>
            <div class="card-body">
                <form action="{{ Request::is('edit-email/*') ? route('update-email', $email->id) : route('make-email') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="title">Email Title</label>
                    <input required type="text" value="{{ $email->title ?? '' }}" name="title" id="title" class="form-control mb-2"
                        placeholder="Enter Email Title">
                    <label for="body">Email Body</label>
                    <textarea type="text" name="body" id="body" class="form-control mb-2 ckeditor"
                        placeholder="Enter Email Title" cols="30" rows="10" required>{{ $email->body ?? '' }}</textarea>
                    <br>
                    @if (Request::is('edit-email/*'))
                        <input required type="submit" value="Update Email" class="btn btn-primary w-100">

                    @else
                        <input required type="submit" value="Compose Email" class="btn btn-primary w-100">

                    @endif

                </form>
            </div>
        </div>
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
                                <td><a href="{{ route('show-email', $email->id) }}">{!! Str::limit($email->body, 30, $end = '...') !!}</a></td>
                                <td>
                                    <a href="{{ route('edit-email', $email->id) }}"
                                        class="btn btn-sm btn-warning">Update</a>
                                    <a href="{{ route('delete-email', $email->id) }}"
                                        class="btn btn-sm btn-danger">Delete</a>
                                    <a href="{{ route('send-email', $email->id) }}" class="btn btn-sm btn-info">Send
                                        Mail</a>
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
@endsection
