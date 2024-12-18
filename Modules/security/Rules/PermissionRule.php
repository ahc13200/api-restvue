<?php
return [
    'create' => [
        'permission' => 'nullable|max:255',
        'description' => 'nullable|max:255'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.security.permissions,id,' . $this->id . ',id',
        'permission' => 'nullable|max:255',
        'description' => 'nullable|max:255'
    ]
];

