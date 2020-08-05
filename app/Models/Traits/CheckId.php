<?php
namespace App\Models\Traits;
use Ramsey\Uuid\Uuid as Uuid;

trait CheckId
{
    /**
     * method bootCheckId
     *
     * Boot Uuid
     * @return void
     */
    public static function bootCheckId() : void
    {
        self::creating(function($model)
        {
            if(!isset($model->id)) {
                $model->id = (string)Uuid::uuid4();
            }
        });
    }
}
