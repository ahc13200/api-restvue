<?php
return [
    'create' => [
        'name' => 'nullable|max:255',
        'phone' => 'nullable|max:255',
        'address' => 'nullable|max:255',
        'province' => 'nullable|max:255',
        'city' => 'nullable|max:255',
        'registered_in' => 'nullable|string|in:web,administración'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.admin.clients,id,' . $this->id . ',id',
        'name' => 'nullable|max:255',
        'phone' => 'nullable|max:255',
        'address' => 'nullable|max:255',
        'province' => 'nullable|max:255',
        'city' => 'nullable|max:255',
        'registered_in' => 'nullable|string|in:shopping,administración'
    ]
];

