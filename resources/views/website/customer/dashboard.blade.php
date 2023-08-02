@extends('website.master')
@section('title')
    Profile
@endsection
@section('body')
    <div class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="{{route('customer.dashboard')}}" type="button" class="list-group-item list-group-item-action active">Dashboard</a>
                        <a href="{{route('customer.profile')}}" type="button" class="list-group-item list-group-item-action">Profile</a>
                        <a href="{{route('customer.order')}}" type="button" class="list-group-item list-group-item-action">My Order</a>
                        <a href="" type="button" class="list-group-item list-group-item-action">Change Password</a>
                        <a href="{{route('customer.logout')}}" type="button" class="list-group-item list-group-item-action">Log Out</a>
                      </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-body">
                        <h1 class=" text-center">My Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection