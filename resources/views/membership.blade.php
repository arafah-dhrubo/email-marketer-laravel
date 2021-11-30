@extends('layouts.app')

@section('content')
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="border rounded-3">
                <div class="card-header">
                    <h5 class="text-center">Basic</h5>
                </div>
                <form action="{{url('select-package', 1)}}" method="POST">
                    {{-- 3/20/2/10 --}}
                    @csrf
                    <ul class="card-body bg-white">
                        <li>3 Email Templates</li>
                        <li>20 Email Address</li>
                        <li>2 Groups</li>
                        <li>Send 10 emails/day</li>
                    </ul>
                    <div class="card-footer"><button class="mx-auto btn-sm w-100 btn btn-primary" type="submit">Select
                            Package</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col">
            <div class="border rounded-3">
                <div class="card-header">
                    <h5 class="text-center">Standard</h5>
                </div>
                <form action="{{url('select-package', 1)}}" method="POST">
                    {{-- 4/25/3/15 --}}
                    @csrf
                    <ul class="card-body bg-white">
                        <li>4 Email Templates</li>
                        <li>25 Email Address</li>
                        <li>3 Groups</li>
                        <li>Send 15 emails/day</li>
                    </ul>
                    <div class="card-footer">
                        <button class="mx-auto btn-sm w-100 btn btn-primary" type="submit">Select Package</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col">
            <div class="border rounded-3">
                <div class="card-header">
                    <h5 class="text-center">Premium</h5>
                </div>
                <form action="{{url('select-package', 1)}}" method="POST">
                    {{-- 5/30/4/20 --}}
                    @csrf
                    <ul class="card-body bg-white">
                        <li>5 Email Templates</li>
                        <li>30 Email Address</li>
                        <li>4 Groups</li>
                        <li>Send 20 emails/day</li>
                    </ul>
                    <div class="card-footer">
                        <button class="mx-auto btn-sm w-100 btn btn-primary" type="submit">Select Package</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
