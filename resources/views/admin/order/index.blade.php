@extends('admin.master')
@section('body')
    @include('sweetalert::alert')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">All Order Information</h4>
            <div class="table-responsive m-t-40 ">
                <table id="myTable" class="table table-striped border ">
                    <thead>
                        <tr class="text-center">
                            <th>SL NO</th>
                            <th>order No</th>
                            <th>order Date</th>
                            <th>Customer Info</th>
                            <th>Order Total</th>
                            <th>order Status</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->order_date }}</td>
                                <td>{{ $order->customer->name . '(' . $order->customer->mobile . ')' }}</td>
                                <td>${{ $order->order_total }}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>{{ $order->payment_type == 1 ? 'Cash On Delivery' : 'Online Payment' }}</td>
                                <td>
                                    <div class="btn-group mt-3">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="">
                                            <button type="submit" class="btn btn-success btn-sm m-1" title="Order Details">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </button>
                                        </form>

                                        <form action="" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="">
                                            <button type="submit" class="btn btn-danger btn-sm m-1" title="Order Delete"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="ti-trash"></i>
                                            </button>
                                        </form>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="">
                                            <button type="submit" class="btn btn-warning btn-sm m-1">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </form>

                                        <form action="" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="">
                                            <button type="submit" class="btn btn-success btn-sm m-1" ">
                                            <i class="ti-reddit"></i>
                                        </button>
                                    </form>
                                </div></td>
                            </tr>
     @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
