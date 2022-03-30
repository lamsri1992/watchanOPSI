@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <h5>
        <i class="far fa-clipboard"></i>
        รายงานข้อมูลผู้ป่วย Covid-19 ที่รับการรักษาแบบ OPSI : Self Isolation
    </h5>
    <table id="tableBasic" class="table table-striped table-borderless">
        <thead class="thead-dark">
            <tr>
                <th>HN</th>
                <th>PID</th>
                <th width="15%">ผู้ป่วย</th>
                <th class="text-center">อายุ</th>
                <th>DX</th>
                <th>สิทธิ์การรักษา</th>
                <th class="text-center" width="12%">วันที่รับบริการ</th>
                <th class="text-center"><i class="fa fa-bars"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($result as $res)
            <tr>
                <td>{{ $res->visit_hn }}</td>
                <td>{{ $res->pid }}</td>
                <td>{{ $res->patient }}</td>
                <td class="text-center">{{ $res->age }}</td>
                <td>{{ $res->visit_dx }}</td>
                <td>{{ $res->plan }}</td>
                <td class="text-center">{{ $res->visit_date }}</td>
                <td>
                    <a href="{{ route('show',$res->t_visit_id) }}" class="btn btn-success btn-sm">
                        <i class="fa fa-print"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('script')

@endsection