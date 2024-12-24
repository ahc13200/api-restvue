<?php
return [
    'create' => [
        'permission' => 'required|max:255||unique:' . $this->connection . '.security.permissions',
        'description' => 'required|max:255'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.security.permissions,id,' . $this->id . ',id',
        'permission' => 'required|max:255||unique:' . $this->connection . '.security.permissions,permission,' . $this->id . ',id',
        'description' => 'required|max:255'
    ]
];

