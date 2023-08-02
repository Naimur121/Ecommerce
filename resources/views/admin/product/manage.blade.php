@extends('admin.master')
@section('body')
    @include('sweetalert::alert')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Table</h4>
            <h6 class="card-subtitle">Data table example</h6>
            <div class="table-responsive m-t-40 ">
                <table id="myTable" class="table table-striped border ">
                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Stock Amount</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($products as $data)
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->code }}</td>
                                <td>{{ $data->stock_amount }}</td>
                                <td><img src="{{ asset($data->image) }}" alt="" height="60px" width="80px"></td>
                                <td>
                                    @if ($data->status == 1)
                                        Published
                                    @else
                                        Unpublished
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group mt-3">

                                        <form action="{{ route('product.delete') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                            <button type="submit" class="btn btn-danger btn-sm m-1"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="ti-trash"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('product.edit') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                            <button type="submit" class="btn btn-warning btn-sm m-1">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('product.details') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                            <button type="submit" class="btn btn-success btn-sm m-1">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
