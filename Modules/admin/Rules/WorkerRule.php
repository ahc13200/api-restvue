<?php
return [
    'create' => [
        'name' => 'required|max:30',
        'image' => 'nullable|max:500',
        'phone' => 'required|max:8|unique:' . $this->connection . '.admin.workers,phone',
        'lastname' => 'nullable|max:30',
        'username' => 'required|max:20|unique:' . $this->connection . '.security.users,username',
        'password' => 'required|max:12',
        'email' => 'required|max:30|unique:' . $this->connection . '.security.users,email'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.admin.workers,id,' . $this->id . ',id',
        'name' => 'max:30',
        'image' => 'nullable|max:500',
        'phone' => 'nullable|max:8||unique:' . $this->connection . '.admin.workers,phone,' . $this->id . ',id',
        'lastname' => 'nullable|max:30',
        'username' => 'required|max:20|unique:' . $this->connection . '.security.users,username,' . $this->user_id . ',id',
        'password' => 'max:12',
        'email' => 'required|max:30|unique:' . $this->connection . '.security.users,email,' . $this->id . ',id'
    ]
];

