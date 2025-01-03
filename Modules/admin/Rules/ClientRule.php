<?php
return [
    'create' => [
        'name' => 'nullable|max:50',
        'phone' => 'nullable|max:8|unique:' . $this->connection . '.admin.clients,phone',
        'address' => 'nullable|max:255',
        'province' => 'nullable|max:255',
        'city' => 'nullable|max:255',
        'registered_in' => 'nullable|string|in:shopping,administración'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.admin.clients,id,' . $this->id . ',id',
        'name' => 'nullable|max:50',
        'phone' => 'nullable|max:255|unique:' . $this->connection . '.admin.clients,phone,' . $this->id . ',id',
        'address' => 'nullable|max:255',
        'province' => 'nullable|max:255',
        'city' => 'nullable|max:255',
        'registered_in' => 'nullable|string|in:shopping,administración'
    ]
];

