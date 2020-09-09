<?php

namespace App\Http\Controllers;

use App\Models\Story_detail;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use phpDocumentor\Reflection\Types\Collection;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param string $method
     * @param Collection $model
     * @param array $values
     * @param string $label
     * @param string $relationName
     * @param array $childValues
     * @param string $method
     * @return array
     */
    public function baseStore($method, $model, $values, $label = null, $relationName = null, $childValues = []){
        $message = ['key' => ucwords(class_basename($model)), 'value' => $label];
        $status = 'error'; $type = 'update';
        $response = $this->getFailedMessage($message, $type);

        if(!isset($model->{getPrimaryKeyFromSpecificTable($model->getTable())})){
            $values['id'] = isset($values['id']) ? $values['id'] : \Illuminate\Support\Str::uuid();
            $type = 'create';
            $response = $this->getFailedMessage($message, $type);
        }

        foreach ($values as $key => $value){
            if(!in_array($key,['save'])){
                $model->$key = $value;
            }
        }

        $saveResult = false;
        DB::transaction(function() use($model, $relationName, $childValues, $method,&$saveResult){
            $model->save();
            if(count($childValues)){
                if($method == 'PUT'){
                    foreach($childValues as $childItem){
                        $tempChild = Story_detail::findOrFail($childItem['id']);
                        foreach($childItem as $key => $value){
                            if($key != 'id'){
                                $tempChild->{$key} = $value;
                            }
                        }
                        $tempChild->save();
                    }
                }else{
                    $model->{$relationName}()->saveMany($childValues);
                }
            }
            $saveResult = true;
        });

        if($saveResult){
            $status = 'success';
            $response = $this->getSuccessMessage($message, $type);
        }

        return ['status' => $status, 'response' => $response, 'id' => $model->$key];
    }

    public function baseDestroy($model, $softDelete = false, $label = null){
        $message = ['key' => ucwords(class_basename($model)), 'value' => $label];
        $status = 'error';
        $response = trans('message.delete_failed', $message);

        if(!$softDelete){
            if ($model->delete()) {
                $status = 'success';
                $response = trans('message.delete_success', $message);
            }
        }else{
            $model->deleted_at = Carbon::now();dd($model);
            if ($model->save()) {
                $status = 'success';
                $response = trans('message.delete_success', $message);
            }
        }
        return ['status' => $status, 'response' => $response];
    }

    /**
     * @param Request $model
     * @param string $route
     * @param array $message
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function baseRedirect(Request $request,String $route, $message){
        if ($request->ajax())
            return response()->json(['message' => $message['response'], 'status' => $message['status'], 'id' => isset($message['id']) ? $message['id'] : '']);

        if ($request->only('save'))
            return redirect()->route($route)->with($message['status'], $message['response']);

        return redirect($route)->with($message['status'], $message['response']);
    }

    /**
     * @param array $message
     * @param string $type
     * @return string
     */
    private function getFailedMessage($message, $type){
        if($type == 'create'){
            return trans('message.create_failed', $message);
        }
        return trans('message.update_failed', $message);
    }

    /**
     * @param array $message
     * @param string $type
     * @return string
     */
    private function getSuccessMessage($message, $type){
        if($type == 'create'){
            return trans('message.create_success', $message);
        }
        return trans('message.update_success', $message);
    }


    /**
     * @param object $model
     * @param string $label
     * @return array
     */
    public function baseChangeStatus($model, $label){
        $message = ['key' => ucwords(class_basename($model)), 'value' => $label];
        $status = 'error'; $type = 'update';
        $response = $this->getFailedMessage($message, $type);

        $model->status = $model->status == 1 ? 2 : 1;
        if($model->save()){
            $status = 'success';
            $response = $this->getSuccessMessage($message, $type);
        }

        return ['status' => $status, 'response' => $response];
    }

    public function removeBranchFieldFromArray($fieldList, $fieldName){
        $roleID = Auth()->user()->roles->first()->id;
        if($roleID == env('ADMIN_ID') || $roleID == env('KASIR_ID')){
            // $request->outlet_id = Auth()->user()->outlet_id;

            if (($key = array_search($fieldName, $fieldList)) !== false) {
                unset($fieldList[$key]);
            }
        }

        return $fieldList;
    }

    public function setDefaultBranchFilter(Request $request){
        $roleID = Auth()->user()->roles->first()->id;
        if($roleID == env('ADMIN_ID') || $roleID == env('KASIR_ID')){
            $request->outlet_id = Auth()->user()->outlet_id;
        }
        return $request;
    }
}
