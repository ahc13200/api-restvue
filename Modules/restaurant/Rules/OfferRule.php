<?php
return [
    'create' => [
        'name' => 'nullable|max:255',
        'price' => 'nullable',
        'image' => 'nullable|max:255'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.restaurant.offers,id,' . $this->id . ',id',
        'name' => 'nullable|max:255',
        'price' => 'nullable',
        'image' => 'nullable|max:255'
    ]
];

