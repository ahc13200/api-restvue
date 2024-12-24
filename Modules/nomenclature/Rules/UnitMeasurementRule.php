<?php
return [
    'create' => [
        'name' => 'required|max:300',
        'acronym' => 'nullable|max:20|unique:' . $this->connection . '.nomenclature.unit_measurement,acronym'
    ],
    'update' => [
        'id' => '|unique:' . $this->connection . '.nomenclature.unit_measurement,id,' . $this->id . ',id',
        'name' => 'max:300',
        'acronym' => 'max:20|unique:' . $this->connection . '.nomenclature.unit_measurement,acronym,' . $this->id . ',id'
    ]
];

