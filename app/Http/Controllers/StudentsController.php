<?php

namespace App\Http\Controllers;


use App\Students;
use App\Registration;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class StudentsController extends Controller
{

    public function getAllData()
    {
        $data = Students::where('status_id', 1)
        ->get();
        return $this->responseSuccess($data);
    }

    public function getRegisteredSubject($id)
    {
        $data = Registration::where('id', $id)
        ->first();
        return $this->responseSuccess($data);

    }

    public function insertData(Request $request)
    {
        $data = new Students();
        $data->student_id=$request->student_id;
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->major_id=$request->major_id;
        $data->address=$request->address;
        if ($data->save()) {
            return $this->responseSuccess($data);
        }
    }
    public function getID($id)
    {
        $data = Students::where('id', $id)
        ->where('status_id',1)
        ->get();
        return $this->responseSuccess($data);

    }

    public function updateData(Request $request, $id)
    {
        $event = new Students();
        $event = Students::where('status_id', 1)
            ->find($id);
        if (!empty($event)) {
            // $event->setData($request->request);
            $event->student_id=$request->student_id;
            $event->first_name=$request->first_name;
            $event->last_name=$request->last_name;
            $event->major_id=$request->major_id;
            $event->address=$request->address;
            if ($event->save()) {
                return $this->responseSuccess($event);
            } else {
                return $this->responseSuccess('ไม่สามารถบันทึกข้อมูลได้');
            }
        } else {
            return $this->responseSuccess("ไม่พบข้อมูล");
        }
    }

    // public function deleteData($id)
    // {
    //     $data = Students::where('id', $id)->delete();
    //     return $this->responseSuccess($data);

    // }
    public function deleteData($id)
    {
        $data = Students::find($id);

            $data->status_id = 3;
            
        if($data->save()){
            return $this->responseRequestSuccess($data);
        }
        
    }

    protected function responseSuccess($res)
    {
        return response()->json(["status" => "success", "data" => $res], 200)
            ->header("Access-Control-Allow-Origin", "http://localhost")
            ->header("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE, OPTIONS");
    }
    public function setData($setArray)
    {
        foreach ($setArray as $key => $value) {
            foreach ($this->_fillable as $valueF) {
                if ($key == $valueF) {
                    $this->$key = $value;
                }
            }
        }
    }
}
