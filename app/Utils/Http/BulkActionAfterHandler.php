<?php

namespace App\Utils\Http;

trait BulkActionAfterHandler
{
    /**
     * @return void
     */
    protected function afterValidation()
    {
        if ($this->filled($this->getSingleActionFieldName())) {
            $bulk = false;
        } else if ($this->filled($this->getBulkActionFieldName())) {
            $bulk = true;
        }

        $this->merge([
            'bulk' => $bulk,
        ]);
    }

    /**
     * @return string
     */
    protected function getSingleActionFieldName()
    {
        return property_exists($this, 'singleActionField')
            ?   $this->singleActionField
            :   'id';
    }

    /**
     * @return string
     */
    protected function getBulkActionFieldName()
    {
        return property_exists($this, 'bulkActionField')
            ?   $this->bulkActionField
            :   'selected_ids';
    }
}
