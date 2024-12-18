<?php
          return [
            'create'=>[
                'worker_id' =>'required|exists:'.$this->connection.'.security.worker,id',
                'area_id' =>'required|exists:'.$this->connection.'.admin.area,id'
            ],
            'update'=>[
                'id' =>'|unique:'.$this->connection.'.admin.worker_area,id,'.$this->id.',id',
                'worker_id' =>'exists:'.$this->connection.'.security.worker,id',
                'area_id' =>'exists:'.$this->connection.'.admin.area,id'
            ]
        ];

