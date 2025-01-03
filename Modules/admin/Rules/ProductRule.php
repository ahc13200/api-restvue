<?php
return [
    'create' => [
        'name' => 'required|max:30',
        'code' => 'required|max:10|unique:' . $this->connection . '.admin.products,code,NULL,id',
        'category_id' => 'required|exists:' . $this->connection . '.nomenclature.category,id',
        'unit_id' => 'required|exists:' . $this->connection . '.nomenclature.unit_measurement,id'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.admin.products,id,' . $this->id . ',id',
        'name' => 'max:30',
        'code' => 'max:10|unique:' . $this->connection . '.admin.products,code,' . $this->id . ',id',
        'category_id' => 'exists:' . $this->connection . '.nomenclature.category,id',
        'unit_id' => 'exists:' . $this->connection . '.nomenclature.unit_measurement,id'
    ]
];

