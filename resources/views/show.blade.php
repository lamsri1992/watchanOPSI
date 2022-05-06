@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col-md-6">
            <h5>
                <i class="far fa-clipboard"></i>
                รายงานข้อมูลผู้ป่วย Covid-19
            </h5>
        </div>
        <div class="col-md-6 text-right">
            <button class="btn btn-light" onclick="printDiv('printThis')">
                <i class="fa fa-print"></i>
                พิมพ์แบบบันทึก OPSI
            </button>
            <button class="btn btn-light" onclick="printDiv('printCHI')">
                <i class="fa fa-print"></i>
                พิมพ์แบบบันทึก CI,HI
            </button>
            <button class="btn btn-light" onclick="printDiv('printSummary')">
                <i class="fa fa-print"></i>
                พิมพ์ใบสรุปค่าใช้จ่าย
            </button>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">
                    <i class="fa-solid fa-clipboard-list"></i>
                    รายชื่อผู้ป่วยทั้งหมด
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ "VISIT ID: ".request('id') }}
            </li>
        </ol>
    </nav>
    <nav style="margin-bottom: 0.5rem;">
        <div class="nav nav-pills" id="nav-tab" role="tablist">
            <a class="nav-link active" id="nav-form-tab" data-toggle="tab" href="#nav-form" role="tab" aria-controls="nav-form" aria-selected="true">
                <i class="fa-solid fa-hand-holding-medical"></i>
                แบบบันทึกข้อมูล OPSI
            </a>
            <a class="nav-link" id="nav-chi-tab" data-toggle="tab" href="#nav-chi" role="tab" aria-controls="nav-chi" aria-selected="true">
                <i class="fa-solid fa-house-chimney-medical"></i>
                แบบบันทึกข้อมูล HI , CI
            </a>
            <a class="nav-link" id="nav-summary-tab" data-toggle="tab" href="#nav-summary" role="tab" aria-controls="nav-summary" aria-selected="false">
                <i class="fa-solid fa-file-invoice"></i>
                ใบสรุปค่าใช้จ่าย
            </a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show" id="nav-form" role="tabpanel" aria-labelledby="nav-form-tab">
            <div id="printThis">
               @include('form')
            </div>
        </div>
        <div class="tab-pane fade show active" id="nav-chi" role="tabpanel" aria-labelledby="nav-chi-tab">
            <div id="printCHI">
               @include('chi')
            </div>
        </div>
        <div class="tab-pane fade" id="nav-summary" role="tabpanel" aria-labelledby="nav-summary-tab">
            <div id="printSummary">
                @include('summary')
             </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
@endsection
