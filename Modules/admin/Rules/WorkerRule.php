<?php
return [
    'create' => [
        'name' => 'required|max:300',
        'image' => 'nullable|max:500',
        'phone' => 'nullable|max:255|unique:' . $this->connection . '.admin.workers,phone',
        'lastname' => 'nullable|max:255',
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.admin.workers,id,' . $this->id . ',id',
        'name' => 'max:300',
        'image' => 'nullable|max:500',
        'phone' => 'nullable|max:255||unique:' . $this->connection . '.admin.workers,phone,' . $this->id . ',id',
        'lastname' => 'nullable|max:255',
    ]
];

