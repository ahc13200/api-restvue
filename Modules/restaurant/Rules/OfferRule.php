<?php
return [
    'create' => [
        'name' => 'required|max:30|unique:' . $this->connection . '.restaurant.offers,name',
        'price' => 'required',
        'image' => 'nullable|max:255',
        'description' => 'required|max:300'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.restaurant.offers,id,' . $this->id . ',id',
        'name' => 'required|max:30||unique:' . $this->connection . '.restaurant.offers,name,' . $this->id . ',id',
        'price' => 'required',
        'image' => 'nullable|max:255',
        'description' => 'required|max:300'
    ]
];

