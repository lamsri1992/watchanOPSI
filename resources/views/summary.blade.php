<div class="card" style="margin-bottom: 0.5rem;">
    <div class="card-body">
        <div class="text-center" style="margin-bottom: 0.5rem;">
            <h5 class="font-weight-bold">ใบสรุปค่าใช้จ่ายผู้ป่วย Covid-19</h5>
            <span class="font-weight-bold">โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</span>
        </div>
        @foreach($result as $res)
        @endforeach
        <div class="row">
            <div class="form-group col-md-8">
                <label class="font-weight-bold">ชื่อ - สกุลผู้รับบริการ : </label> {{ $res->patient }}
            </div>
            <div class="form-group col-md-4 text-right">
                <label class="font-weight-bold">รหัสสถานพยาบาล : </label> 23736
            </div>
            <div class="form-group col-md-12">
                <label class="font-weight-bold">เลขบัตรประจำตัวประชาชน/Passport/เลขต่างด้าว : </label> {{ $res->pid }}
            </div>
            <div class="form-group col-md-4">
                <label class="font-weight-bold">HN : </label> {{ $res->hn }}
            </div>
            <div class="form-group col-md-4">
                <label class="font-weight-bold">VN : </label> {{ $res->vn }}
            </div>
            <div class="form-group col-md-4">
                <label class="font-weight-bold">รหัส ATK : </label> ............................................................................
            </div>
            <div class="form-group col-md-12">
                <label class="font-weight-bold">สิทธิ์การรักษา : </label> {{ $res->plan }}
            </div>
            <div class="form-group col-md-6">
                <label class="font-weight-bold">วันที่รับไว้ดูแล : </label> {{ $res->visit_date }}
            </div>
            <div class="form-group col-md-6 text-right">
                <label class="font-weight-bold">วันที่จำหน่าย : </label> {{ $res->visit_dc }}
            </div>
            <div class="form-group col-md-12">
                <table class="table table-bordered table-borderless table-striped table-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th>หมวดที่ 1 ค่าห้อง</th>
                            <th class="text-center">จำนวน</th>
                            <th class="text-right">ราคา</th>
                            <th class="text-right">รวม</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $q_room = 0; $q_drug = 0; $q_lab = 0; @endphp
                        @foreach ($room as $rooms)
                        @php $q_room += $rooms->order_price * $rooms->order_qty @endphp
                        <tr>
                            <td>{{ $rooms->order_common_name }}</td>
                            <td class="text-center">{{ $rooms->order_qty }}</td>
                            <td class="text-right">{{ number_format($rooms->order_price,2) }} ฿</td>
                            <td class="text-right">{{ number_format($rooms->order_price * $rooms->order_qty,2) }} ฿</td>
                        </tr>
                        @endforeach
                        <tr class="font-weight-bold">
                            <td class="text-center">
                                รวมทั้งหมด
                            </td>
                            <td class="text-right" colspan="3">
                                {{ number_format($q_room,2) }} ฿
                            </td>
                        </tr>
                    </tbody>
                    <thead class="thead-dark">
                        <tr>
                            <th>หมวดที่ 3 รายการยา</th>
                            <th class="text-center">จำนวน</th>
                            <th class="text-right">ราคา</th>
                            <th class="text-right">รวม</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($drug as $drugs)
                        @php $q_drug += $drugs->order_price * $drugs->order_qty @endphp
                        <tr>
                            <td>{{ $drugs->order_common_name }}</td>
                            <td class="text-center">{{ $drugs->order_qty }}</td>
                            <td class="text-right">{{ number_format($drugs->order_price,2) }} ฿</td>
                            <td class="text-right">{{ number_format($drugs->order_price * $drugs->order_qty,2) }} ฿</td>
                        </tr>
                        @endforeach
                        <tr class="font-weight-bold">
                            <td class="text-center">
                                รวมทั้งหมด
                            </td>
                            <td class="text-right" colspan="3">
                                {{  number_format($q_drug,2) }} ฿
                            </td>
                        </tr>
                    </tbody>
                    <thead class="thead-dark">
                        <tr>
                            <th>หมวดที่ 7 ค่าตรวจวินิจฉัยทางเทคนิคการแพทย์</th>
                            <th class="text-center">จำนวน</th>
                            <th class="text-right">ราคา</th>
                            <th class="text-right">รวม</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lab as $labs)
                        @php $q_lab += $labs->order_price * $labs->order_qty @endphp
                        <tr>
                            <td>{{ $labs->order_common_name }}</td>
                            <td class="text-center">{{ $labs->order_qty }}</td>
                            <td class="text-right">{{ number_format($labs->order_price,2) }} ฿</td>
                            <td class="text-right">{{ number_format($labs->order_price * $labs->order_qty,2) }} ฿</td>
                        </tr>
                        @endforeach
                        <tr class="font-weight-bold">
                            <td class="text-center">
                                รวมทั้งหมด
                            </td>
                            <td class="text-right" colspan="3">
                                {{  number_format($q_lab,2) }} ฿
                            </td>
                        </tr>
                    </tbody>
                    <thead class="thead-dark">
                        <tr>
                            <th>หมวดที่อื่น ๆ</th>
                            <th class="text-center">จำนวน</th>
                            <th class="text-right">ราคา</th>
                            <th class="text-right">รวม</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label">
                                        080001 Chest X-Ray กรณีโควิด (100 บาท/ครั้ง)
                                    </label>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label">
                                        COVV01 ค่าทำความสะอาดพาหนะในการส่งต่อ และค่าชุด PPE (1,400 บาท/ครั้ง)
                                    </label>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label">
                                        S1801 ค่าพาหนะส่งต่อไม่เกิน 500 บาท
                                    </label>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label">
                                        S1802 ค่าพาหนะส่งต่อส่วนเกิน 500 บาท (4 บาท/กม.)
                                    </label>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="font-weight-bold">
                            <td class="text-center">
                                รวมทั้งหมด
                            </td>
                            <td class="text-right" colspan="3"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>