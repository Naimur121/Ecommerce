@extends('website.master')
@section('title')
    Order
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
                    <div class="table-responsive m-t-40 ">
                        <table id="myTable" class="table table-striped border ">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Order No</th>
                                    <th>Order Date</th>
                                    <th>Order Total</th>
                                    <th>Order Status</th>
                                    <th>Delivery Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody >
                                {{-- <?php $i = 1;?>
                                @foreach ($products as $data)
                                    <tr >
                                        <td><?php  echo $i++; ?></td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->description }}</td>
                                        <td><img src="{{ asset($data->image) }}" alt="" height="60px" width="80px"></td>
                                        <td>
                                            @if ($data->status == 1)
                                                Published
                                            @else
                                                Unpublished
                                            @endif
                                        </td>
                                        <td >
                                            <div class="btn-group mt-3">
                                                @if ($data->status == 1)
                                            <a href="{{route('status',['id' => $data->id])}}" class="btn btn-success btn-sm m-1">
                                                <i class="fa-solid fa-check"></i>
                                            </a>
                                            @else
                                            <a href="{{route('status',['id' => $data->id])}}" class="btn btn-danger btn-sm m-1">
                                                <i class="fa-solid fa-xmark"></i>
                                            </a>
                                            @endif
                                            
                                            <form action="{{route('delete')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$data->id}}">
                                                <button type="submit" class="btn btn-danger btn-sm m-1" onclick="return confirm('Are you sure?')">
                                                    <i class="ti-trash"></i>
                                                </button>
                                            </form>
                                            <form action="{{route('edit')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$data->id}}">
                                                <button type="submit" class="btn btn-warning btn-sm m-1">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach --}}
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($order_all as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->order_date}}</td>
                                    <td>${{$item->order_total}}</td>
                                    <td>{{$item->order_status}}</td>
                                    <td>{{$item->delivery_address}}</td>
                                    <td>
                                        <a href="" class=" btn btn-success">Details</a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection