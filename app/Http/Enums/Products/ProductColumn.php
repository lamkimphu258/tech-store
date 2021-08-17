<?php

namespace App\Http\Enums\Products;

use App\Http\Enums\ModelColumn;

class ProductColumn extends ModelColumn
{
    public const NAME = 'name';

    public const THUMBNAIL = 'thumbnail';

    public const QUANTITY_SOLD = 'quantity_sold';

    public const PRICE = 'price';

    public const DEBUTED_AT = 'debuted_at';

    public const RATE_ID = 'rate_id';

    public const CATEGORY_ID = 'category_id';
}
