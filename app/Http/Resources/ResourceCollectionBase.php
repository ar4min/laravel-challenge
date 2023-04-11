<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ResourceCollectionBase extends ResourceCollection
{
    /**
     * @var JsonResource
     */
    private $collect;
    /**
     * @var array
     */
    private $collect_param;

    /**
     * ResourceBase constructor.
     *
     * @param $resource
     * @param $collect JsonResource
     * @param array $collect_param
     */
    public function __construct($resource, $collect, $collect_param = [])
    {
        $this->collect = $collect;
        $this->collect_param = $collect_param;
        parent::__construct($resource);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        $result = collect();

        $settings = $this->resource->toArray();

        unset($settings['data']);

        $items = $this->collection->map(function ($data) {
            return (new $this->collect($data))->additional($this->collect_param);
        });

        $settings = collect($settings)->filter(function ($key,$field) {
            return !in_array($field, $this->unsetSettingParams());
        })->toArray();

        $result->put('items', $items);
        $result->put('settings', $settings);

        if (isset($this->collect_param) && !empty($this->collect_param) && is_array($this->collect_param)) {
            foreach ($this->collect_param as $key => $param) {
                $result->put($key, $param);
            }
        }

        return $result->toArray();
    }

    /**
     * @return array
     */
    private function unsetSettingParams(): array
    {
        return [
            'links',
            'first_page_url',
            'last_page_url',
            'next_page_url',
            'prev_page_url',
            'path',
        ];
    }
}
