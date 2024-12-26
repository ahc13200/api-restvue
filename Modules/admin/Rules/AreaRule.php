<?php
return [
    'create' => [
        'name' => 'required|max:30',
        'code' => 'required|max:10|unique:' . $this->connection . '.admin.areas,code',
        'description' => 'nullable|max:300'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.admin.areas,id,' . $this->id . ',id',
        'name' => 'max:30',
        'code' => 'max:10|unique:' . $this->connection . '.admin.areas,code,' . $this->id . ',id',
        'description' => 'max:300'
    ]
];

