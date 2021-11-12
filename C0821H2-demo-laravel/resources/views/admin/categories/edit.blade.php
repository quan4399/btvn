@extends('admin.master')
@section('content-admin')
    <div class="card mt-2">
        <h5 class="card-header">Cập nhật thông tin thể loại</h5>
        <div class="card-body">
            <form method="post" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control  @error('name') is-invalid @enderror" >
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1);return false">Hủy</button>
            </form>
        </div>
    </div>
@endsection
