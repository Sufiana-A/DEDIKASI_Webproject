
@extends('layout.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="font-size: 20px; font-weight: bold; margin-left: 10px;">Seleksi Peserta</h4>
                        </div>    
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" style="font-size: 14px;"">
                                    <thead>
                                        <th>Waktu Enroll</th>
                                        <th>Nama Peserta</th>
                                        <th>Pelatihan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <!-- Static Data Row 1 -->
                                        <tr>
                                            <td>2024-04-19 13:10:00</td>
                                            <td>John Doe</td>
                                            <td>Web Development</td>
                                            <td>Active</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Update Status</button>                                                
                                            </td>
                                        </tr>
                                        <!-- Static Data Row 2 -->
                                        <tr>
                                            <td>2024-04-19 09:30:00</td>
                                            <td>Jane Smith</td>
                                            <td>Data Science</td>
                                            <td>Pending</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Update Status</button>                                                
                                            </td>
                                        </tr>
                                        <!-- Add more static rows as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        {{-- </div> --}}
    </div>
  </div>
@endsection
