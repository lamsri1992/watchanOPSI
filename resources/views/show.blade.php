@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col-md-6">
            <h5>
                <i class="far fa-clipboard"></i>
                รายงานข้อมูลผู้ป่วย Covid-19 ที่รับการรักษาแบบ OPSI : Self Isolation
            </h5>
        </div>
        <div class="col-md-6 text-right">
            <button class="btn btn-light" onclick="printDiv('printThis')">
                <i class="fa fa-print"></i>
                พิมพ์แบบบันทึก
            </button>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">รายชื่อผู้ป่วยทั้งหมด</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ "VISIT ID: ".request('id') }}</li>
        </ol>
    </nav>
    <div id="printThis">
        <div class="card" style="margin-bottom: 0.5rem;">
            <div class="card-body">
                @foreach($result as $res)
                @endforeach
                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="font-weight-bold">ชื่อหน่วยบริการ :</label> โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา
                    </div>
                    <div class="form-group col-md-2">
                        <label class="font-weight-bold">รหัสหน่วยบริการ : </label> 23736
                    </div>
                    <div class="form-group col-md-3">
                        <label class="font-weight-bold">วันที่รับบริการ : </label> {{ $res->visit_date }}
                    </div>
                    <div class="form-group col-md-3">
                        <label class="font-weight-bold">วันที่จำหน่าย : </label> {{ $res->visit_dc }}
                    </div>
                    <div class="form-group col-md-4">
                        <label class="font-weight-bold">ชื่อ - สกุล : </label> {{ $res->patient }}
                    </div>
                    <div class="form-group col-md-2">
                        <label class="font-weight-bold">PID : </label> {{ $res->pid }}
                    </div>
                    <div class="form-group col-md-3">
                        <label class="font-weight-bold">เพศ : </label> {{ $res->gender }}
                    </div>
                    <div class="form-group col-md-3">
                        <label class="font-weight-bold">อายุ : </label>
                        {{ $res->age." ปี" }}
                    </div>
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">สิทธิ์การรักษา : </label> {{ $res->plan }}
                    </div>
                    <div class="form-group col-md-3">
                        <label class="font-weight-bold">HN : </label> {{ $res->hn }}
                    </div>
                    <div class="form-group col-md-3">
                        <label class="font-weight-bold">VN : </label> {{ $res->vn }}
                    </div>
                    <div class="form-group col-md-12">
                        <label class="font-weight-bold">อาการสำคัญ : </label> {{ $res->ccpi }}
                    </div>
                    <div class="form-group col-md-12">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th width="25%">การซักประวัติเพื่อประเมินอาการแรกรับ</th>
                                    <th width="25%">ตรวจร่างกายแรกรับ</th>
                                    <th width="50%">คำสั่งการรักษา</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label font-weight-bold">
                                                ไม่มีภาวะเสี่ยง
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label font-weight-bold">
                                                มีภาวะเสี่ยง (กลุ่มเสี่ยง 608) ระบุ
                                            </label>
                                        </div>
                                        <ul>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">
                                                    อายุ > 60 ปี
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">
                                                    โรคระบบทางเดินหายใจ
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">
                                                    โรคหลอดเลือดสมอง
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">
                                                    โรคหัวใจ และหลอดเลือด
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">
                                                    โรคมะเร็ง
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">
                                                    โรคเบาหวาน
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">
                                                    โรคอ้วน (BMI > 30 or BW > 90 kg)
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">
                                                    CKD (โรคไตวายเรื้อรัง)
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">
                                                    หญิงตั้งครรภ์ 12 สัปดาห์ขึ้นไป
                                                </label>
                                            </div>
                                        </ul>
                                    </td>
                                    <td>
                                        <p>น้ำหนัก : {{ $res->visit_vital_sign_weight }} กิโลกรัม</p>
                                        <p>ส่วนสูง : {{ $res->visit_vital_sign_height }} เซนติเมตร</p>
                                        <p>BT : {{ $res->visit_vital_sign_temperature }} องศา</p>
                                        <p>PR : {{ $res->visit_vital_sign_heart_rate }} / min</p>
                                        <p>RR : {{ $res->visit_vital_sign_respiratory_rate }} / min</p>
                                        <p>BP : {{ $res->visit_vital_sign_blood_presure }} mmHg</p>
                                        <p>ประจำเดือนครั้งสุดท้าย : </p>
                                    </td>
                                    <td>
                                        <table class="table table-borderless table-bordered">
                                            <thead>
                                                <tr class="text-center">
                                                    <th width="30%">รายการสั่งยา</th>
                                                    <th width="30%">รายการ LAB</th>
                                                    <th width="30%">รายการ XRAY</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <ul>
                                                            @foreach($drug as $drugs)
                                                                <li>
                                                                    {{ $drugs->order_common_name }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            @foreach($lab as $labs)
                                                                <li>
                                                                    {{ $labs->order_common_name }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            @foreach($xray as $xrays)
                                                                <li>
                                                                    {{ $xrays->order_common_name }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-center">
                                            <span class="font-weight-bold">
                                                ปัญหา และการวินิจฉัยอื่น ๆ
                                            </span>
                                        </div>
                                        <br><br><br><br>
                                        <div class="text-center">
                                            <span class="font-weight-bold">
                                                Plan
                                            </span>
                                        </div>
                                        <br><br><br><br>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <span class="font-weight-bold">
                                                ผลการตรวจคัดกรอง
                                            </span>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label font-weight-bold">
                                                Rapid Antigen test
                                            </label>
                                        </div>
                                        <span>วันที่ตรวจ : </span><br>
                                        <span>หน่วยที่คัดกรอง : </span><br><br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label font-weight-bold">
                                                RTPCR (ถ้ามี) ผล :
                                            </label>
                                        </div>
                                        <span>วันที่ตรวจ : </span><br>
                                        <span>หน่วยที่คัดกรอง : </span>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <span class="font-weight-bold">
                                                แบบยินยอมการเข้ารับการรักษา
                                            </span>
                                        </div>
                                        <p class="font-weight-bold">ข้าพเจ้ายินยอมการรักษาแบบ OP with Self Isolation</p>
                                        <p class="font-weight-bold">ลงชื่อผู้ป่วย/ญาติ</p>
                                        <p class="font-weight-bold">ลงชื่อพยาน</p>
                                        <p class="font-weight-bold">ผ่าน เบอร์โทรศัพท์</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="text-center">
                                            <span class="font-weight-bold">
                                                การติดตามประเมินอาการ <br>
                                                เมื่อครบ 48 ชม.
                                                วันที่............................................................................................
                                                เวลา........................................................ น.
                                            </span>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr class="text-center">
                                                    <th width="50%">อาการแทรกซ้อน</th>
                                                    <th width="50%">การดูแลรักษา</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">
                                                                เหนื่อย
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">
                                                                ไอ
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">
                                                                เจ็บหน้าอก
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">
                                                                Resting 02 Sat <= 94%
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">
                                                                อื่น ๆ
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <span class="font-weight-bold">
                                                การติดตามประเมินอาการ <br>
                                                เมื่อครบ 48 ชม.
                                                วันที่............................................................................................
                                                เวลา........................................................ น.
                                            </span>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr class="text-center">
                                                    <th width="50%">อาการแทรกซ้อน</th>
                                                    <th width="50%">การดูแลรักษา</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">
                                                                เหนื่อย
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">
                                                                ไอ
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">
                                                                เจ็บหน้าอก
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">
                                                                Resting 02 Sat <= 94%
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">
                                                                อื่น ๆ
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="text-center">
                                            <span class="font-weight-bold">
                                                การส่งต่อ
                                            </span>
                                        </div>
                                        <p class="font-weight-bold">Refer ไปยัง</p>
                                        <p class="font-weight-bold">ส่งตัวเพื่อ</p>
                                        <p class="font-weight-bold">สาเหตุที่ส่ง</p>
                                    </td>
                                    <td>
                                        <div class="row text-center">
                                            <div class="col-md-6">
                                                <p class="font-weight-bold">
                                                    ลงชื่อแพทย์ผู้รักษา <br>
                                                    ............................................................................................
                                                    (...........................................................................................)
                                                </p>
                                                <p class="font-weight-bold">
                                                    เลขใบอนุญาตประกอบวิชาชีพ <br>
                                                    .............................................................................................
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="font-weight-bold">
                                                    ลงชื่อพยาบาล <br>
                                                    ............................................................................................
                                                    (...........................................................................................)
                                                </p>
                                                <p class="font-weight-bold">
                                                    เลขใบอนุญาตประกอบวิชาชีพ <br>
                                                    .............................................................................................
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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
