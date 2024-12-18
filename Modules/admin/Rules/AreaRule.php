<?php
return [
    'create' => [
        'name' => 'required|max:300',
        'code' => 'required|max:10',
        'description' => 'nullable|max:300'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.admin.areas,id,' . $this->id . ',id',
        'name' => 'max:300',
        'code' => 'max:10',
        'description' => 'max:300'
    ]
];

