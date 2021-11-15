@extends('admin.master')
@section('content-admin')
    <div class="card mt-2">
        <h5 class="card-header">Change Password</h5>
        <div class="card-body">
            <form method="post" action="{{ route('users.pwdStore') }}">
                @csrf

                <div class="form-group" style="position: relative">
                    <label for="">Old Password</label>
                    <input type="password" name="oldpwd" class="form-control  @error('oldpwd') is-invalid @enderror">
                    <a style="position: absolute;top:55%;right:20px;color: #333" href="javascript:;void(0)"><i
                            class="fa fa-eye"></i></a>
                    @error('oldpwd')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group" style="position: relative">
                    <label for="">New Password</label>
                    <input type="password" name="newpwd" class="form-control  @error('newpwd') is-invalid @enderror">
                    <a style="position: absolute;top:55%;right:20px;color: #333" href="javascript:;void(0)"><i
                            class="fa fa-eye"></i></a>
                    @error('newpwd')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group" style="position: relative">
                    <label for="">Confirm Password</label>
                    <input type="password" name="cfm" class="form-control  @error('cfm') is-invalid @enderror">
                    <a style="position: absolute;top:55%;right:20px;color: #333" href="javascript:;void(0)"><i
                            class="fa fa-eye"></i></a>
                    @error('cfm')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                @if (session()->has('error'))
                    <div class="alert alert-danger">{{ session()->get('error') }}</div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
