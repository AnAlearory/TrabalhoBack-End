<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'produto' => $this->produto,
            'marca' => $this->marca,
            'fabricante' => $this->fabricante,
            'lote' => $this->lote,
            'preco' => $this->preco,
            'Quantidade em estoque' => $this->qtd_estoque,
        ];
    }
}
