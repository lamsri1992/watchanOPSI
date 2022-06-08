<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class opController extends Controller
{
    public function index()
    {
        $result = DB::select("SELECT 
                    f_patient_prefix.patient_prefix_description||t_patient.patient_firstname||' '||t_patient.patient_lastname AS patient,
                    t_patient.patient_pid AS pid,f_sex.sex_description AS gender,t_visit.visit_patient_age AS age,
                    b_contract_plans.contract_plans_description AS plan,
                    t_visit_primary_symptom.visit_primary_symptom_current_illness AS ccpi,
                    b_employee.employee_firstname||' '||b_employee.employee_lastname AS dr,b_employee.employee_number AS numbers,
                    t_visit.visit_hn,t_visit.visit_vn,t_visit.visit_dx,t_visit.visit_begin_visit_time AS visit_date,
                    t_visit.visit_financial_discharge_time AS visit_dc,t_visit.t_visit_id
                FROM 
                t_visit INNER JOIN t_patient  ON t_visit.t_patient_id = t_patient.t_patient_id 
                LEFT JOIN f_patient_prefix ON t_patient.f_patient_prefix_id = f_patient_prefix.f_patient_prefix_id
                INNER JOIN t_visit_payment ON t_visit.t_visit_id = t_visit_payment.t_visit_id 
                LEFT JOIN b_contract_plans ON t_visit_payment.b_contract_plans_id = b_contract_plans.b_contract_plans_id	
                LEFT JOIN t_diag_icd10 
                    ON (t_visit.t_visit_id = t_diag_icd10.diag_icd10_vn AND t_diag_icd10.f_diag_icd10_type_id = '1' AND  t_diag_icd10.diag_icd10_active = '1' )
                LEFT JOIN  t_diag_icd9 
                    ON (t_visit.t_visit_id = t_diag_icd9.diag_icd9_vn AND t_diag_icd9.diag_icd9_active ='1' AND t_diag_icd9.f_diagnosis_operation_type_id = '1')
                LEFT JOIN t_visit_primary_symptom ON t_visit_primary_symptom.t_visit_id = t_visit.t_visit_id
                LEFT JOIN f_sex ON t_patient.f_sex_id = f_sex.f_sex_id
                LEFT JOIN b_employee ON b_employee.b_employee_id = t_diag_icd10.diag_icd10_staff_doctor
                WHERE visit_dx LIKE '%(Z29.0)%' AND visit_dx LIKE '%(U07.1)%' OR visit_dx LIKE '%(U07.2)%'
                GROUP BY 
                    t_visit.t_visit_id,f_patient_prefix.patient_prefix_description,t_patient.patient_firstname
                    ,t_patient.patient_lastname,t_patient.patient_pid,t_patient.patient_birthday
                    ,t_diag_icd10.diag_icd10_number,f_sex.sex_description,t_diag_icd9.diag_icd9_icd9_number
                    ,t_visit_payment.visit_payment_main_hospital,b_contract_plans.contract_plans_description
                    ,t_visit_primary_symptom.visit_primary_symptom_current_illness,b_employee.employee_number
                    ,b_employee.employee_firstname,b_employee.employee_lastname,t_visit.visit_dx
                    ,t_visit.visit_begin_visit_time,t_visit.t_visit_id
                ORDER BY t_visit.visit_begin_visit_time DESC");
        return view('list',['result'=>$result]);
    }

    public function show($id)
    {
        $result = DB::select("SELECT 
                    f_patient_prefix.patient_prefix_description||t_patient.patient_firstname||' '||t_patient.patient_lastname AS patient,
                    t_patient.patient_pid AS pid,f_sex.sex_description AS gender,t_visit.visit_patient_age AS age,
                    b_contract_plans.contract_plans_description AS plan,
                    t_visit_primary_symptom.visit_primary_symptom_current_illness AS ccpi,
                    b_employee.employee_firstname||' '||b_employee.employee_lastname AS dr,b_employee.employee_number AS numbers,
                    t_visit.visit_hn,t_visit.visit_vn,t_visit.visit_dx,t_visit.visit_begin_visit_time AS visit_date,
                    t_visit.visit_financial_discharge_time AS visit_dc,t_visit.t_visit_id,
                    t_visit.visit_hn AS hn,t_visit.visit_vn AS vn,
                    t_visit_vital_sign.visit_vital_sign_height,t_visit_vital_sign.visit_vital_sign_weight,
                    t_visit_vital_sign.visit_vital_sign_blood_presure,t_visit_vital_sign.visit_vital_sign_temperature,
                    t_visit_vital_sign.visit_vital_sign_heart_rate,t_visit_vital_sign.visit_vital_sign_respiratory_rate
                FROM t_visit 
                INNER JOIN t_patient  ON t_visit.t_patient_id = t_patient.t_patient_id 
                LEFT JOIN f_patient_prefix ON t_patient.f_patient_prefix_id = f_patient_prefix.f_patient_prefix_id
                INNER JOIN t_visit_payment ON t_visit.t_visit_id = t_visit_payment.t_visit_id 
                LEFT JOIN b_contract_plans ON t_visit_payment.b_contract_plans_id = b_contract_plans.b_contract_plans_id	
                LEFT JOIN t_diag_icd10 
                    ON (t_visit.t_visit_id = t_diag_icd10.diag_icd10_vn AND t_diag_icd10.f_diag_icd10_type_id = '1' AND  t_diag_icd10.diag_icd10_active = '1' )
                LEFT JOIN  t_diag_icd9 
                    ON (t_visit.t_visit_id = t_diag_icd9.diag_icd9_vn AND t_diag_icd9.diag_icd9_active ='1' AND t_diag_icd9.f_diagnosis_operation_type_id = '1')
                LEFT JOIN t_visit_primary_symptom ON t_visit_primary_symptom.t_visit_id = t_visit.t_visit_id
                LEFT JOIN f_sex ON t_patient.f_sex_id = f_sex.f_sex_id
                LEFT JOIN b_employee ON b_employee.b_employee_id = t_diag_icd10.diag_icd10_staff_doctor
                LEFT JOIN t_visit_vital_sign ON t_visit_vital_sign.t_visit_id = t_visit.t_visit_id
                WHERE t_visit.t_visit_id = '$id'
                GROUP BY 
                    t_visit.t_visit_id,f_patient_prefix.patient_prefix_description,t_patient.patient_firstname
                    ,t_patient.patient_lastname,t_patient.patient_pid,t_patient.patient_birthday
                    ,t_diag_icd10.diag_icd10_number,f_sex.sex_description,t_diag_icd9.diag_icd9_icd9_number
                    ,t_visit_payment.visit_payment_main_hospital,b_contract_plans.contract_plans_description
                    ,t_visit_primary_symptom.visit_primary_symptom_current_illness,b_employee.employee_number
                    ,b_employee.employee_firstname,b_employee.employee_lastname,t_visit.visit_dx
                    ,t_visit.visit_begin_visit_time,t_visit.visit_financial_discharge_time,t_visit.t_visit_id
                    ,t_visit.visit_hn,t_visit.visit_vn, t_visit_vital_sign.visit_vital_sign_height,t_visit_vital_sign.visit_vital_sign_weight,
                    t_visit_vital_sign.visit_vital_sign_blood_presure,t_visit_vital_sign.visit_vital_sign_temperature,
                    t_visit_vital_sign.visit_vital_sign_heart_rate,t_visit_vital_sign.visit_vital_sign_respiratory_rate
                ORDER BY t_visit.visit_begin_visit_time ASC");

        $drug = DB::table('t_order')->select('order_common_name','order_qty','order_price')
                ->where('t_visit_id',$id)
                ->where('f_item_group_id',1)
                ->get();

        $chi = DB::table('t_order')->select('order_common_name','order_qty','order_price')
                ->where('t_visit_id',$id)
                ->where('f_item_group_id',1)
                ->where('order_common_name','not like','%Favipiravir%')
                ->get();

        $favi = DB::table('t_order')->select('order_common_name','order_qty','order_price')
                ->where('t_visit_id',$id)
                ->where('order_common_name','like','%Favipiravir%')
                ->get();
                
        $lab = DB::table('t_order')->select('order_common_name','order_qty','order_price')
                ->where('t_visit_id',$id)
                ->where('f_item_group_id',2)
                ->get();

        $xray = DB::table('t_order')->select('order_common_name','order_qty','order_price')
                ->where('t_visit_id',$id)
                ->where('f_item_group_id',3)
                ->get();

        $room = DB::table('t_order')->select('order_common_name','order_qty','order_price')
                ->where('t_visit_id',$id)
                ->where('f_item_group_id',5)
                ->get();

        return view('show',['result'=>$result,'drug'=>$drug,'lab'=>$lab,'xray'=>$xray,'room'=>$room,'chi'=>$chi,'favi'=>$favi]);
    }

    public function search(Request $request)
    {
        $start = substr($request->start,4);
        $sYear = date("Y",strtotime($request->start))+543;
        $sNew = $sYear.$start;

        $end = substr($request->end,4);
        $eYear = date("Y",strtotime($request->end))+543;
        $eNew = $eYear.$end;

        $result = DB::select("SELECT 
                    f_patient_prefix.patient_prefix_description||t_patient.patient_firstname||' '||t_patient.patient_lastname AS patient,
                    t_patient.patient_pid AS pid,f_sex.sex_description AS gender,t_visit.visit_patient_age AS age,
                    b_contract_plans.contract_plans_description AS plan,
                    t_visit_primary_symptom.visit_primary_symptom_current_illness AS ccpi,
                    b_employee.employee_firstname||' '||b_employee.employee_lastname AS dr,b_employee.employee_number AS numbers,
                    t_visit.visit_hn,t_visit.visit_vn,t_visit.visit_dx,t_visit.visit_begin_visit_time AS visit_date,
                    t_visit.visit_financial_discharge_time AS visit_dc,t_visit.t_visit_id
                FROM 
                t_visit INNER JOIN t_patient  ON t_visit.t_patient_id = t_patient.t_patient_id 
                LEFT JOIN f_patient_prefix ON t_patient.f_patient_prefix_id = f_patient_prefix.f_patient_prefix_id
                INNER JOIN t_visit_payment ON t_visit.t_visit_id = t_visit_payment.t_visit_id 
                LEFT JOIN b_contract_plans ON t_visit_payment.b_contract_plans_id = b_contract_plans.b_contract_plans_id	
                LEFT JOIN t_diag_icd10 
                    ON (t_visit.t_visit_id = t_diag_icd10.diag_icd10_vn AND t_diag_icd10.f_diag_icd10_type_id = '1' AND  t_diag_icd10.diag_icd10_active = '1' )
                LEFT JOIN  t_diag_icd9 
                    ON (t_visit.t_visit_id = t_diag_icd9.diag_icd9_vn AND t_diag_icd9.diag_icd9_active ='1' AND t_diag_icd9.f_diagnosis_operation_type_id = '1')
                LEFT JOIN t_visit_primary_symptom ON t_visit_primary_symptom.t_visit_id = t_visit.t_visit_id
                LEFT JOIN f_sex ON t_patient.f_sex_id = f_sex.f_sex_id
                LEFT JOIN b_employee ON b_employee.b_employee_id = t_diag_icd10.diag_icd10_staff_doctor
                WHERE(SUBSTRING(t_visit.visit_begin_visit_time,1,10) BETWEEN ('$sNew') AND ('$eNew'))
                AND visit_dx LIKE '%(Z29.0)%' AND visit_dx LIKE '%(U07.1)%' OR visit_dx LIKE '%(U07.2)%'
                 
                GROUP BY 
                    t_visit.t_visit_id,f_patient_prefix.patient_prefix_description,t_patient.patient_firstname
                    ,t_patient.patient_lastname,t_patient.patient_pid,t_patient.patient_birthday
                    ,t_diag_icd10.diag_icd10_number,f_sex.sex_description,t_diag_icd9.diag_icd9_icd9_number
                    ,t_visit_payment.visit_payment_main_hospital,b_contract_plans.contract_plans_description
                    ,t_visit_primary_symptom.visit_primary_symptom_current_illness,b_employee.employee_number
                    ,b_employee.employee_firstname,b_employee.employee_lastname,t_visit.visit_dx
                    ,t_visit.visit_begin_visit_time,t_visit.t_visit_id
                ORDER BY t_visit.visit_begin_visit_time DESC");
        return view('report',['result'=>$result]);
        // dd($result);
    }
}
