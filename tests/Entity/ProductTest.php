<?php

namespace App\Tests\Entity;

use App\Entity\Product;

class ProductTest extends \PHPUnit\Framework\TestCase
{/*
    public function testDefault()
    {
        $product = new Product('Pomme', 'food', 1);
        $this->assertSame(0.055, $product->computeTVA());
    }

    public function testcomputeTVAFoodProduct()
    {
        $product = new Product('Un produit', Product::FOOD_PRODUCT, 20);
        // 1,1 représente le résultat attendu
        $this->assertSame(1.1, $product->computeTVA());
    }

    public function testComputeTVAOtherProduct()
    {
        $product = new Product('Un autre produit', 'Un autre type de produit', 20);
        $this->assertSame(3.92, $product->computeTVA());
    }

    public function testNegativePriceComputeTVA()
    {
        $product = new Product('Un produit', Product::FOOD_PRODUCT, -20);
        $this->expectException('Exception');
        $product->computeTVA();
    }
    */

    // Pour éviter d'avoir à écrire plusieurs fonctions pour plusieurs entrées différentes, on utilise les dataproviders

    /**
     * @dataProvider pricesForFoodProduct
     */
    public function testcomputeTVAFoodProduct($price, $expectedTva)
    {
        $product = new Product('Un produit', Product::FOOD_PRODUCT, $price);
        $this->assertSame($expectedTva, $product->computeTVA());
    }
    public function pricesForFoodProduct()
    {
        // On effectue maintenant 3 tests différents en changeant juste les paramètres
        return [
            [0, 0.0],
            [20, 1.1],
            [100, 5.5]
        ];
    }
}
