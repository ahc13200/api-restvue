<?php
return [
    'create' => [
        'date' => 'nullable|date',
        'meal_type' => 'max:30|unique:' . $this->connection . '.restaurant.menu,meal_type'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.restaurant.menu,id,' . $this->id . ',id',
        'date' => 'nullable|date',
        'meal_type' => 'max:30|unique:' . $this->connection . '.restaurant.menu,meal_type,' . $this->id . ',id'
    ]
];

