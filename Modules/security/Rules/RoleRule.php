<?php
return [
    'create' => [
        'name' => 'required|max:30|unique:' . $this->connection . '.security.roles,name',
        'description' => 'required|max:300'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.security.roles,id,' . $this->id . ',id',
        'name' => 'required|max:30|unique:' . $this->connection . '.security.roles,name,' . $this->id . ',id',
        'description' => 'required|max:300'
    ]
];

