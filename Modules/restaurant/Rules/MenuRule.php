<?php
return [
    'create' => [
        'date' => 'nullable|date',
        'meal_type' => 'nullable|max:255'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.restaurant.menu,id,' . $this->id . ',id',
        'date' => 'nullable|date',
        'meal_type' => 'nullable|max:255'
    ]
];

