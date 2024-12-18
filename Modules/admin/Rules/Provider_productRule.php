<?php
          return [
            'create'=>[
                'price' =>'required',
                'image' =>'nullable|max:10',
                'stock_quantity' =>'required',
                'product_id' =>'required|exists:'.$this->connection.'.admin.product,id',
                'provider_id' =>'required|exists:'.$this->connection.'.admin.provider,id'
            ],
            'update'=>[
                'id' =>'|unique:'.$this->connection.'.admin.provider_product,id,'.$this->id.',id',
                'price' =>'',
                'image' =>'nullable|max:10',
                'stock_quantity' =>'',
                'product_id' =>'exists:'.$this->connection.'.admin.product,id',
                'provider_id' =>'exists:'.$this->connection.'.admin.provider,id'
            ]
        ];

