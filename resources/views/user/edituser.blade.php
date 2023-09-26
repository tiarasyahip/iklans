@extends('layouts.app')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="data_user">Data User</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('update_user', ['id' => $data_user->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama1">Nama:</label>
                            <input name="name" type="name" class="form-control" id="nama1"
                                placeholder="Masukkan nama" value="{{ $data_user->name }}">
                            @error('name')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email1">Email:</label>
                            <input type="email" class="form-control" id="email1" name="email"
                                placeholder="Masukkan email" value="{{ $data_user->email }}">
                            @error('email')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pilih</label>
                            <select class="form-control" type="level" name="level">
                                <option value="admin" <?php if ($data_user->level == 'admin') {
                                    echo 'selected="selected"';
                                } ?>>Admin</option>
                                <option value="operator" <?php if ($data_user->level == 'operator') {
                                    echo 'selected="selected"';
                                } ?>>Operator</option>
                            </select>
                            @error('level')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pass">Password:</label>
                            <input type="password" class="form-control" id="pass" name="password"
                                placeholder="Masukkan password">
                            @error('password')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection