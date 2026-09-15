<?php

namespace Database\Factories;

use App\Models\Carte;
use App\Models\Extension;
use App\Models\TypeSwu;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends Factory<Carte>
 */
class CarteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'extension_id' => Extension::factory(),
            'cardable_type' => TypeSwu::class,
            'cardable_id' => TypeSwu::factory(),
        ];
    }

    /**
     * Associe un modèle cardable spécifique (ex: TypeSwu ou autre futur jeu).
     */
    public function forCardable(Model $cardable): static
    {
        return $this->state(fn (array $attributes) => [
            'cardable_type' => $cardable->getMorphClass(),
            'cardable_id' => $cardable->getKey(),
        ]);
    }
}
