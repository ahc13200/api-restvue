<?php
          return [
            'create'=>[
                'menu_id' =>'nullable|exists:'.$this->connection.'.restaurant.menu,id',
                'offer_id' =>'nullable|exists:'.$this->connection.'.restaurant.offers,id'
            ],
            'update'=>[
                'id' =>'|unique:'.$this->connection.'.restaurant.menu_offers,id,'.$this->id.',id',
                'menu_id' =>'nullable|exists:'.$this->connection.'.restaurant.menu,id',
                'offer_id' =>'nullable|exists:'.$this->connection.'.restaurant.offers,id'
            ]
        ];

