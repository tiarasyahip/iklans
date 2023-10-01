@extends('layouts.app')

@section('header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Transaksi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <?php
                        function tanggal($tanggal)
                        {
                            $bulan = [
                                1 => 'Januari',
                                'Februari',
                                'Maret',
                                'April',
                                'Mei',
                                'Juni',
                                'Juli',
                                'Agustus',
                                'September',
                                'Oktober',
                                'November',
                                'Desember',
                            ];
                        
                            $pecahkan = explode('-', $tanggal);
                        
                            // variabel pecahkan 0 = tahun
                            // variabel pecahkan 1 = bulan
                            // variabel pecahkan 2 = tanggal
                        
                            return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
                        } ?>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Nominal</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal</th>
                                        <th>Jenis</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($index as $d) : ?>
                                    <tr>
                                        <td><?= $d['id'] ?></td>
                                        <td><?= $d['nama'] ?></td>
                                        <td>Rp. <?= number_format($d['nominal'], 0, ',', '.') ?></td>
                                        <td><?php if ($d['keterangan'] == '') {
                                            echo '(Tanpa Keterangan)';
                                        } else {
                                            echo $d['keterangan'];
                                        } ?></td>
                                        <td>
                                            <?php echo tanggal($d['tanggal']); ?>
                                        </td>
                                        <td><?php if ($d['jenis_id'] == 1) {
                                            echo 'Radio';
                                        } elseif ($d['jenis_id'] == 2) {
                                            echo 'Videotron';
                                        }
                                        ?></td>
                                        <td>
                                            <a href="{{ route('transaksi.edit', ['id' => $d->id]) }}"
                                                class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>
                                            <a data-toggle="modal" data-target="#modal-hapus{{ $d->id }}"
                                                class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                                            <a href="{{ route('transaksi.struk', ['id' => $d->id]) }}" rel="noopener"
                                                target="_blank" class="btn btn-default"><i class="fas fa-print"></i>
                                                Print</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-hapus{{ $d->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah kamu ingin menghapus data ini?
                                                        (<b>{{ $d->nama }}</b></b>)</p>
                                                </div>
                                                <div class="modal-footer content-between">
                                                    <form action="{{ route('transaksi.destroy', ['id' => $d->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <script>
        $(function() {
            $("#table_user").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "print", "colvis"]
            }).buttons().container().appendTo('#table_user_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection