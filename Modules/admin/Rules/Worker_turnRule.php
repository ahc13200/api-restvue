<?php
          return [
            'create'=>[
                'turn_id' =>'required|exists:'.$this->connection.'.admin.turn,id',
                'worker_area_id' =>'required|exists:'.$this->connection.'.admin.worker_area,id'
            ],
            'update'=>[
                'id' =>'|unique:'.$this->connection.'.admin.worker_turn,id,'.$this->id.',id',
                'turn_id' =>'exists:'.$this->connection.'.admin.turn,id',
                'worker_area_id' =>'exists:'.$this->connection.'.admin.worker_area,id'
            ]
        ];

