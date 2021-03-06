<?php

namespace Glitter\Http\Controllers\Office\Product;

use Glitter\Eloquent\Models\Product;
use Glitter\Eloquent\Models\Variant;
use Glitter\Http\Controllers\Controller;
use Glitter\Services\Office\Product\PersistentService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EditController extends Controller
{
    public function input(Product $product)
    {
        return view('glitter.office::product.edit', [
            'product' => $product,
        ]);
    }

    public function save(Request $request, PersistentService $service, $key)
    {
        try {
            $product = $service->update($key, [
                'name'                  => $request->input('name'),
                'description'           => $request->input('description') ?: '',
                'variants'              => array_map(function ($input) {
                    return [
                        'id'                    => array_get($input, 'id'),
                        'price'                 => array_get($input, 'price'),
                        'reference_price'       => array_get($input, 'reference_price'),
                        'taxes_included'        => array_get($input, 'taxes_included') ?: false,
                        'sku'                   => array_get($input, 'sku'),
                        'barcode'               => array_get($input, 'barcode'),
                        'inventory_management'  => array_get($input, 'inventory_management') ?: 'none',
                        'inventory_quantity'    => array_get($input, 'inventory_quantity'),
                        'out_of_stock_purchase' => array_get($input, 'out_of_stock_purchase') ?: false,
                        'requires_shipping'     => array_get($input, 'requires_shipping') ?: false,
                        'weight'                => array_get($input, 'weight'),
                        'weight_unit'           => array_get($input, 'weight_unit'),
                        'fulfillment_service'   => array_get($input, 'fulfillment_service'),
                        'options'               => array_get($input, 'options', []),
                    ];
                }, $request->input('variants', [])),
            ]);

            return redirect()->back()->withFlashMessage([trans('glitter::office.save.success')]);
        } catch (ModelNotFoundException $e) {
            return view('glitter.office::errors.404');
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->validator);
        }
    }

    public function inputVariant(Variant $variant)
    {
        return view('glitter.office::product.edit_variant', [
            'product' => $variant->product,
            'variant' => $variant,
        ]);
    }

    public function saveVariant(Request $request, PersistentService $service, Variant $variant)
    {
        try {
            $variant = $service->update_variant($variant->getKey(), [
                'id'                    => $request->input('id'),
                'price'                 => $request->input('price'),
                'reference_price'       => $request->input('reference_price'),
                'taxes_included'        => $request->input('taxes_included') ?: false,
                'sku'                   => $request->input('sku'),
                'barcode'               => $request->input('barcode'),
                'inventory_management'  => $request->input('inventory_management') ?: 'none',
                'inventory_quantity'    => $request->input('inventory_quantity'),
                'out_of_stock_purchase' => $request->input('out_of_stock_purchase') ?: false,
                'requires_shipping'     => $request->input('requires_shipping') ?: false,
                'weight'                => $request->input('weight'),
                'weight_unit'           => $request->input('weight_unit'),
                'fulfillment_service'   => $request->input('fulfillment_service'),
                'options'               => $request->input('options', []),
            ]);

            return redirect()->back()->withFlashMessage([trans('glitter::office.save.success')]);
        } catch (ModelNotFoundException $e) {
            return view('glitter.office::errors.404');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator);
        }
    }
}
