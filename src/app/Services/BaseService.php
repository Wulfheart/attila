<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

abstract class BaseService
{

    abstract public function execute();

    /**
     * Get the validation rules that apply to the service.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * Validate all datas to execute the service.
     *
     * @param array $data
     * @return bool
     */
    public function validate(): void
    {
        Validator::make((array) $this, $this->rules())
            ->validate();

    }

  
}
