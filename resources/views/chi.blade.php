<div class="card" style="margin-bottom: 0.5rem;">
    <div class="card-body">
        <h5 class="text-center font-weight-bold">แบบบันทึกข้อมูลผู้ป่วย Covid-19 กรณี Home Isolation หรือ Community Isolation</h5>
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
            <div class="form-group col-md-3">
                <label class="font-weight-bold">PID : </label> {{ $res->pid }}
            </div>
            <div class="form-group col-md-2">
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
                                <div class="text-center">
                                    <label class="form-check-label font-weight-bold" style="background-color: red;color: white;width: 100%;">
                                        อาการสำคัญที่บ่งชี้ว่าน่าจะเกิดอาการรุนแรง
                                    </label>
                                </div>
                                <ul>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            ไอเยอะ (Severe cough)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            แน่นหน้าอก (Chest tightness)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            ทานอาหารไม่ได้ (Poor appetite)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            อ่อนเพลียมาก (Fatigue)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            ไข้ตลอดทุกวันในช่วงที่มีอาการ
                                        </label>
                                    </div>
                                </ul>
                                <div class="text-center">
                                    <label class="form-check-label font-weight-bold" style="background-color: yellow;;width: 100%;">
                                        ปัจจัยเสี่ยงต่อการเกิดอาการรุนแรง
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
                                            COPD, include chronic lung disease
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
                                            Chronic Heart disease
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            CVA (โรคหลอดเลือดสมอง)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            T2DM
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            BMI > 30 OR BW > 90kg
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            Citthosis (โรคตับแข็ง)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            Immunocompromise (ภาวะภูมิคุ้มกันต่ำ)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            Absolute lymphocyte < 1000 cell/mm3
                                        </label>
                                    </div>
                                </ul>
                                <div class="text-center">
                                    <label class="form-check-label font-weight-bold" style="background-color: yellow;;width: 100%;">
                                        การประเมินสภาพจิตใจและภาวะซึมเศร้า
                                    </label>
                                </div>
                                <ul>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label font-weight-bold">
                                            สภาพจิตใจ........................................
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label font-weight-bold">
                                            ผลกระทบของความเจ็บป่วยต่อชีวิตประจำวัน.............................................
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            ใน 2 สัปดาห์ที่ผ่านมารวมวันนี้ ท่านรู้สึกหดหู่ เศร้า หรือท้อแท้สิ้นหวัง
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            ใน 2 สัปดาห์ที่ผ่านมารวมวันนี้ ท่านรู้สึก เบื่อ ทำอะไรก็ไม่เพลิดเพลิน
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
                                <div style="margin-bottom: 0.5rem;">
                                    <label class="form-check-label font-weight-bold border text-center" style="width: 100%;">
                                        Test Excercise Induce Hypoxia test
                                    </label>
                                    <p>O2sat.........................% (ก่อน)</p>
                                    <p>O2sat.........................% (หลัง)</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            Test ให้ผลบวก (spO2 drop >= 3)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            ไม่
                                        </label>
                                    </div>
                                </div>
                                <div style="margin-bottom: 0.5rem;">
                                    <label class="form-check-label font-weight-bold border text-center" style="width: 100%;">
                                        ผล LAB
                                    </label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label font-weight-bold">
                                            มีผล Chest X-ray
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            ปกติ
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            ผิดปกติ........................................
                                        </label>
                                    </div>
                                </div>
                                <div style="margin-bottom: 0.5rem;">
                                    <label class="form-check-label font-weight-bold border text-center" style="width: 100%;">
                                        ผลตรวจคัดกรอง
                                    </label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label font-weight-bold">
                                            Rapid antigen test
                                        </label>
                                    </div>
                                    <p>วันที่ตรวจ................................................................</p>
                                    <p>หน่วยที่คัดกรอง..................................................</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label font-weight-bold">
                                            RTPCR ผล ........................................
                                        </label>
                                    </div>
                                    <p>วันที่ตรวจ................................................................</p>
                                    <p>หน่วยที่คัดกรอง..................................................</p>
                                </div>
                                <div style="margin-bottom: 0.5rem;">
                                    <label class="form-check-label font-weight-bold border text-center" style="width: 100%;">
                                        การเตรียมอุปกรณ์และยา
                                    </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="">
                                        <label class="form-check-label" for="inlineCheckbox"> ปรอทวัดไข้</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="">
                                        <label class="form-check-label" for="inlineCheckbox"> เครื่องพ่นยา</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="">
                                        <label class="form-check-label" for="inlineCheckbox"> เครื่องวัด O2 ปลายนิ้ว</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="">
                                        <label class="form-check-label" for="inlineCheckbox"> ยา</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="">
                                        <label class="form-check-label" for="inlineCheckbox"> เครื่องผลิตออกซิเจน</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="">
                                        <label class="form-check-label" for="inlineCheckbox"> หน้ากากอนามัย</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="">
                                        <label class="form-check-label" for="inlineCheckbox"> ถุงแดง</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <table class="table table-borderless table-bordered">
                                    <tr style="background-color: green;color: white;">
                                        <td width="">Level 1 (Green)</td>
                                    </tr>
                                    <tr class="">
                                        <td>
                                            <ul>
                                                @foreach($chi as $chis)
                                                    <li>
                                                        {{ $chis->order_common_name }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr style="background-color: yellow;">
                                        <td width="">Level 2 (Yellow)</td>
                                    </tr>
                                    <tr class="">
                                        <td>
                                            <ul>
                                                @foreach($favi as $favis)
                                                    <li>
                                                        {{ $favis->order_common_name }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr style="background-color: red;color: white;">
                                        <td width="">Level 3 (Red)</td>
                                    </tr>
                                    <tr class="">
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">
                                                    Refer รพ.
                                                </label>
                                                <br><br><br><br>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <div class="text-center">
                                    <label class="form-check-label font-weight-bold border" style="width: 100%;">
                                        แบบยินยอมเข้ารับการรักษา
                                    </label>
                                </div>
                                <p class="font-weight-bold">ข้าพเจ้ายินยอมการรักษา โดยวิธีดูแลตัวเองที่บ้าน (Home Isolation / Community Isolation)</p>
                                <p class="font-weight-bold">ลงชื่อผู้ป่วย/ญาติ</p>
                                <p class="font-weight-bold">ลงชื่อพยาน</p>
                                <p class="font-weight-bold">วันที่</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>