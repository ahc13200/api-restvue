<?php
return [
    'create' => [
        'category_id' => 'nullable|exists:' . $this->connection . '.nomenclature.category,id',
        'name' => 'required|max:30|unique:' . $this->connection . '.nomenclature.category,name',
        'description' => 'nullable|max:255'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.nomenclature.category,id,' . $this->id . ',id',
        'category_id' => 'nullable|exists:' . $this->connection . '.nomenclature.category,id',
        'name' => 'max:30|unique:' . $this->connection . '.nomenclature.category,name,' . $this->id . ',id',
        'description' => 'max:255'
    ]
];

