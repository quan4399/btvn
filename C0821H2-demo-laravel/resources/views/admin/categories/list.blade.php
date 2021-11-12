@extends('admin.master')
@section('content-admin')
    <div class="col-12 mt-2">
        <a class="btn btn-success" href="{{ route('categories.create') }}">Thêm mới</a>
        <button class="btn btn-danger delete-product">Delete</button>
    </div>
    <div class="card mt-2">
        <h5 class="card-header">Danh sách thể loại sản phẩm</h5>
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th><input type="checkbox"></th>
                    <th>STT</th>
                    <th>Tên thể loại sản phẩm </th>
                </tr>
                @forelse($categories as $key => $category)
                    <tr id="product-item-{{$category->id}}">
                        <td><input type="checkbox" class="product-checked" value="{{$category->id}}"></td>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Cập nhật</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">không có thông tin </td>
                    </tr>
                @endforelse
            </table>

        </div>
    </div>
@endsection

