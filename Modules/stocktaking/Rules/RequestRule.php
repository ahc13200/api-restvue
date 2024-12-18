<?php
          return [
            'create'=>[
                'worker_area_turn_id' =>'nullable|exists:'.$this->connection.'.admin.worker_area_turns,id',
                'description' =>'nullable',
                'status' =>'nullable|max:255',
                'date' =>'nullable|date'
            ],
            'update'=>[
                'id' =>'|unique:'.$this->connection.'.stocktaking.requests,id,'.$this->id.',id',
                'worker_area_turn_id' =>'nullable|exists:'.$this->connection.'.admin.worker_area_turns,id',
                'description' =>'nullable',
                'status' =>'nullable|max:255',
                'date' =>'nullable|date'
            ]
        ];

