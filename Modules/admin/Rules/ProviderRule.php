<?php
return [
    'create' => [
        'name' => 'required|max:30',
        'identification' => 'nullable|max:15',
        'phone' => 'nullable|max:8|unique:' . $this->connection . '.admin.providers',
        'email' => 'required|max:30|unique:' . $this->connection . '.admin.providers',
        'country' => 'required|max:30',
        'city' => 'required|max:30',
        'classification' => 'nullable|max:10',
        'fax' => 'nullable|max:15',
        'observations' => 'nullable|max:300',
        'address' => 'nullable|max:50',
        'postal_code' => 'nullable|max:8|min:5',
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.admin.providers,id,' . $this->id . ',id',
        'name' => 'max:30',
        'identification' => 'nullable|max:15',
        'phone' => 'nullable|max:8|unique:' . $this->connection . '.admin.providers,phone,' . $this->id . ',id',
        'email' => 'max:30|unique:' . $this->connection . '.admin.providers,email,' . $this->id . ',id',
        'country' => '|max:255',
        'city' => '|max:255',
        'classification' => 'nullable|max:10',
        'fax' => 'nullable|max:15',
        'observations' => 'nullable|max:300',
        'address' => 'nullable|max:50',
        'postal_code' => 'nullable|max:8|min:5',
    ]
];


