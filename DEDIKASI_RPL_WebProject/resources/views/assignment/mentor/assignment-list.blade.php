@extends('layout.master')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="font-size: 20px; font-weight: bold; margin-left: 10px; color:#3d5ee1";>Assignment | Penugasan Peserta</h4> <br>
                            <h6> > Silakan tambahkan penugasan untuk Peserta!</h6> <br>
                        </div>    
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" style="font-size: 14px;"">
                                    <thead>
                                        <th>ID Tugas</th>
                                        <th>Nama Penugasan</th>
                                        <th>Deskripsi Tugas</th>
                                        <th>Link Terkait</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ASC010</td>
                                            <td>Web Development Assignment</td>
                                            <td>Penugasan WAD</td>
                                            <td>https://drive.google.com/file/d/1SyQqm-jsSDnHUo9NjOsQ7gDGDTu-e1mZ/view?usp=drive_link</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Update</button>
                                                <button class="btn btn-danger btn-sm"><i class="fas fa-delete"></i> Delete</button>                                                
                                            </td>
                                        </tr> 
                                    </tbody>
                                </table>
                            </div>
                            <br><a href=# class="btn btn-primary" ><i class="fas fa-add"></i> Tambahkan Penugasan Baru</a>          
                        </div>
                    </div>
                </div>
            </div>
    </div>
  </div>
@endsection