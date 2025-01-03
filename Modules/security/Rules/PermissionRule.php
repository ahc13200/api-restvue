<?php
return [
    'create' => [
        'permission' => 'required|max:30|unique:' . $this->connection . '.security.permissions,permission',
        'description' => 'required|max:255',
        'module' => 'required|max:255',
        'event' => 'required|max:255'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.security.permissions,id,' . $this->id . ',id',
        'permission' => 'required|max:30|unique:' . $this->connection . '.security.permissions,permission,' . $this->id . ',id',
        'description' => 'required|max:255',
        'module' => 'required|max:255',
        'event' => 'required|max:255'
    ]
];

