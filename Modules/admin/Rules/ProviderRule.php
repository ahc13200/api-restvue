<?php
return [
    'create' => [
        'name' => 'required|max:300',
        'identification' => 'nullable|max:300',
        'phone' => 'nullable|max:20',
        'email' => 'required|max:200|required|max:30|unique:' . $this->connection . '.admin.providers',
        'city' => 'nullable|max:255',
        'product_type' => 'nullable|max:255',
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.admin.providers,id,' . $this->id . ',id',
        'name' => 'max:300',
        'identification' => 'nullable|max:300',
        'phone' => 'nullable|max:20',
        'email' => 'max:200|unique:' . $this->connection . '.admin.providers,email,' . $this->id . ',id',
        'city' => 'nullable|max:255',
        'product_type' => 'nullable|max:255',
    ]
];

