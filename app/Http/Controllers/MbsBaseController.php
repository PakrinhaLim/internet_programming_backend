<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class MbsBaseController extends Controller
{
    protected $model;

    public function __construct($model = null)
    {
        $this->model = $model;
    }

    public function index()
    {
        $data = $this->model::where('status_id', Status::$ACTIVE)->get();

        return $this->responseRequestSuccess($data);
    }

    public function getAll(Request $request)
    {
        $data = $this->model::where('status_id', Status::$ACTIVE)
            ->orderBy('created_at', 'asc')
            ->get();
            
        return $this->responseRequestSuccess($data);
    }

    public function getDataPaginate(Request $request, $limit)
    {
        $condition = $this->setFilterCondition($request);
        $data = $this->model::where($condition)
            ->orderBy('created_at', 'asc')
            ->paginate($limit);

        return $this->responseRequestSuccess($data);
    }

    public function getData($id)
    {
        $data = $this->model::where('status_id', Status::$ACTIVE)
            ->find($id);

        return $this->responseRequestSuccess($data);
    }

    public function addData(Request $request)
    {
        $setArray = $request->request;
        $this->model->setData($setArray);

        if ($this->model->save()) {
            return $this->responseRequestSuccess($this->model);
        } else {
            return $this->responseRequestError("Cannot create " . $this->model->getTable());
        }
    }

    public function updateData(Request $request, $id)
    {
        $getData = $this->model::where('id', $id)
            ->where('status_id', Status::$ACTIVE)
            ->first();

        if (!empty($getData)) {
            $setArray = $request->request;
            $getData->setData($setArray);

            if ($getData->save()) {
                return $this->responseRequestSuccess($getData);
            } else {
                return $this->responseRequestError("Cannot update " . $this->model->getTable());
            }
        } else {
            return $this->responseRequestError("Cannot find " . $this->model->getTable());
        }
    }

    public function deleteData($id)
    {
        $data = $this->model::findOrFail($id);
        $data->status_id = Status::$DELETED;
        $data->save();

        return $this->responseRequestSuccess($data);
    }

    protected function responseRequestSuccess($ret)
    {
        return response()->json(['status' => 'success', 'data' => $ret], 200)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }

    protected function responseRequestError($message = 'Bad request', $statusCode = 200)
    {
        return response()->json(['status' => 'error', 'error' => $message], $statusCode)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }

    protected function removeOldUploadImage($destination_path, $file_path)
    {
        $old_image_arr = explode('/', $file_path);
        $old_image = end($old_image_arr);

        if ($old_image && file_exists($destination_path . $old_image)) {
            unlink($destination_path . $old_image);
        }
    }

    protected function saveImage($base64_image, $subPath)
    {
        if (!empty($base64_image)) {
            $img_uniqid = uniqid('', true);
            $image = $base64_image;
            $destinationPath = "../public/upload/" . $subPath;

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $imgData = substr($image, 1 + strrpos($image, ","));

            if (file_put_contents("./upload/" . $subPath . "/" . $subPath . "-" . $img_uniqid . ".png", base64_decode($imgData)) != null) {
                return "/upload/" . $subPath . "/" . $subPath . "-" . $img_uniqid . ".png";
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function removeFile($image_path)
    {
        if (!empty($image_path) && file_exists('.' . $image_path)) {
            if (unlink('.' . $image_path)) {
                return true;
            } else {
                return false;
            }
        }
    }
}
