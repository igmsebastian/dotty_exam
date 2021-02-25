<?php

namespace App\Http\Services;

class MediaService
{
    /**
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @param string $request_name
     * @param  string $collection_name
     * @param  string $disk
     * @return Seminar|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public static function storeSingleFile($model, $request_name, $collection_name, $disk)
    {
        if($model->hasMedia($collection_name)){
            $model->getFirstMedia($collection_name)->delete();
        }

        $model->addMediaFromRequest($request_name)->toMediaCollection($collection_name, $disk);
    }
}
