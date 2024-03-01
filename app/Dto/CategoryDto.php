<?php

namespace App\Dto;

class CategoryDto
{
    public readonly string $name;
    public readonly string $parent_id;
    public readonly string $blade_template;



    public function __construct($request){
        $this->name = $request['name'];
        $this->parent_id = $request['parent_id'] ?? '';
        $this->blade_template = $request['blade'];
    }

    public static function fromRequest($request){
        return new self($request);
    }

    public function toArray(){
        return [
            'name' => $this->name,
            'parent_id' => $this->parent_id,
            'blade_template' => $this->blade_template,
        ];
    }
}
