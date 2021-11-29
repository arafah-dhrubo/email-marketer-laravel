@extends('layouts.app')

@section('content')
<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
        <div class="border rounded-3">
            <div class="card-header">
                <h5 class="text-center">Basic</h5>
            </div>
        <ul class="card-body bg-white">
            <li>3 Email Templates</li>
            <li>20 Email Address</li>
            <li>2 Groups</li>
            <li>Send 10 emails/day</li>
        </ul>
        <div class="card-footer"><a class="mx-auto btn-sm w-100 btn btn-primary" href="">Select Package</a></div>
        </div>
    </div>
    <div class="col">
        <div class="border rounded-3">
        <div class="card-header">
            <h5 class="text-center">Standard</h5>
        </div>
        <ul class="card-body bg-white">
            <li>4 Email Templates</li>
            <li>25 Email Address</li>
            <li>3 Groups</li>
            <li>Send 15 emails/day</li>
        </ul>
        <div class="card-footer">
            <a class="mx-auto btn-sm w-100 btn btn-primary" href="">Select Package</a>
        </div>
        </div>
    </div>
    <div class="col">
        <div class="border rounded-3">
        <div class="card-header">
            <h5 class="text-center">Premium</h5>
        </div>
        <ul class="card-body bg-white">
            <li>5 Email Templates</li>
            <li>30 Email Address</li>
            <li>4 Groups</li>
            <li>Send 20 emails/day</li>
        </ul>
        <div class="card-footer">
            <a class="mx-auto btn-sm w-100 btn btn-primary" href="">Select Package</a>
        </div>
        </div>
    </div>
</div>
@endsection
