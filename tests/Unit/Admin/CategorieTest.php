<?php

namespace Tests\Unit\Admin;

use App\Models\Categorie;
use App\Models\Plat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;


class CategorieTest extends TestCase
{
    use RefreshDatabase;

    public function test_categorie_has_fillable_attributes()
    {
        $categorie = new Categorie();

        $this->assertEquals([
            'Nom',
            'Description',
        ], $categorie->getFillable());
    }

    public function test_categorie_has_plats_relationship()
    {
        $categorie = Categorie::factory()->create();
        $plat = Plat::factory()->create(['Id_Categorie' => $categorie->Id_Categorie]);

        $this->assertTrue($categorie->plats->contains($plat));
    }
}
