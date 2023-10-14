<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public static $wrap = 'payload';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        // dd($request->route()->action);
        $lng = explode('/', $request->route()->action['prefix']);

        return [

            'id' => $this->id,
            'addedBy' => 'mingo',
            'userId' => 1,
            'name' => $this->field('name', $lng[1]),
            'slug' => $this->slug,
            'categoryIds' => [$this->category->id],
            'brandId' => $this->brand->id ?? '',
            'unit' => '',
            'minQty' => '1',
            'refundable' => '',
            'images' => $this->all_photos,
            'thumbnail' => $this->photo,
            'featured' => '',
            'flashDeal' => '',
            'videoProvider' => '',
            'videoUrl' => '',
            'colors' => $this->all_colors,
            'variantProduct' => '',
            'attributes' => $this->all_attributes,
            'choiceOptions' => [],
            'variation' => [],
            'published' => '',
            'unitPrice' => $this->formated_price,
            'purchasePrice' => $this->formated_price,
            'tax' => '5',
            'taxType' => 'percent',
            'discount' => '20',
            'discountType' => 'percent',
            'currentStock' => '10',
            'details' => $this->field('description', $lng[1]),
            'freeShipping' => '',
            'attachment' => '',
            'createdAt' => $this->created_at->format('Y-m-d H:i:s'),
            'updatedAt' => $this->updated_at->format('Y-m-d H:i:s'),
            'status' => '',
            'featuredStatus' => '',
            //'reviews' => $this->all_reviews,
            'rating' => [

                (object) ['average' => '4.7', 'productId' => "$this->id"],
            ],
            //'category' => $this->category,
        ];
    }
}
