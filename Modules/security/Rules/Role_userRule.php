<?php
          return [
            'create'=>[
                'worker_id' =>'required|exists:'.$this->connection.'.security.workers,id',
                'role_id' =>'required|exists:'.$this->connection.'.security.roles,id'
            ],
            'update'=>[
                'id' =>'|unique:'.$this->connection.'.security.role_workers,id,'.$this->id.',id',
                'worker_id' =>'exists:'.$this->connection.'.security.workers,id',
                'role_id' =>'exists:'.$this->connection.'.security.roles,id'
            ]
        ];

