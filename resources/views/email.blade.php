@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="alert alert-success" role="alert">

            </div>
        @endif
        <div class="card">
            <div class="card-header">
                Email To Be Send
            </div>

            <div class="card-body">
                <h4>{!! $email->title !!}</h4>
                <p>{!! $email->body !!}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Email Address List
            </div>
            <form action="{{ route('send') }}" method="post">
                @csrf
                <input name="eid" type="hidden" value="{{ $email->id }}">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sl no</th>
                                <th>Email Address</th>
                                <th>Select</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collections as $index => $collection)
                                <tr>
                                    <td>{{ $index + $collections->firstItem() }} </td>
                                    <td>{{ $collection->email }}</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="checkbox[]"
                                                value="{{ $collection->id }}" id="flexCheckDefault">
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </select>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-around">
                    <div>
                        {{ $collections->links() }}
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-warning">Send Mail</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
