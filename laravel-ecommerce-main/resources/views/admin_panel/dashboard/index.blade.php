@extends('admin_panel.adminLayout')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pesanan</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                       Waktu
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Total Pembayaran
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales as $s)
                                <tr>
                                    <td class="font-weight-medium">
                                        {{$s->created_at}}
                                    </td>
                                    <td class="font-weight-medium">
                                        {{$s->order_status}}
                                    </td>
                                    <td class="font-weight-medium">
                                        {{$s->price}}
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