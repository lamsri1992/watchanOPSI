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
            <a href="#" class="btn btn-light">
                <i class="fa fa-print"></i>
                พิมพ์แบบบันทึก
            </a>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">รายชื่อผู้ป่วยทั้งหมด</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ "VISIT ID: ".request('id') }}</li>
        </ol>
    </nav>
    <div class="card" style="margin-bottom: 0.5rem;">
        <div class="card-body">
            @foreach ($result as $res)
            @endforeach
            <div class="row">
                <div class="form-group col-md-4">
                    <label class="font-weight-bold">ชื่อหน่วยบริการ :</label>  โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา
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
                    <label class="font-weight-bold">อายุ : </label> {{ $res->age." ปี" }}
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
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th width="30%">การซักประวัติเพื่อประเมินอาการแรกรับ</th>
                                <th width="20%">ตรวจร่างกายแรกรับ</th>
                                <th width="40%">คำสั่งการรักษา</th>
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
                                    <ul>
                                        @foreach ($drug as $drugs)
                                        <li>
                                            {{ $drugs->order_common_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection