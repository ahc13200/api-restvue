<?php
return [
    'create' => [
        'name' => 'required|max:30|unique:' . $this->connection . '.nomenclature.unit_measurement,name',
        'acronym' => 'nullable|max:10|unique:' . $this->connection . '.nomenclature.unit_measurement,acronym'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.nomenclature.unit_measurement,id,' . $this->id . ',id',
        'name' => 'max:30|unique:' . $this->connection . '.nomenclature.unit_measurement,name,' . $this->id . ',id',
        'acronym' => 'max:10|unique:' . $this->connection . '.nomenclature.unit_measurement,acronym,' . $this->id . ',id'
    ]
];

