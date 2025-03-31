<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Label;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LabelControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex(): void
    {
        $response = $this->get(route('labels.index'));

        $response->assertOk();
    }

    public function testEdit(): void
    {
        $this->actingAs(User::factory()->create());

        $model = Label::factory()->create();
        $response = $this->get(route('labels.edit', $model));

        $response->assertOk();
    }

    public function testCreate(): void
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get(route('labels.create'));

        $response->assertOk();
    }

    public function testStore(): void
    {
        $this->actingAs(User::factory()->create());

        $body = Label::factory()->make()->toArray();
        $response = $this->post(route('labels.store'), $body);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('labels', $body);
    }

    public function testUpdate(): void
    {
        $this->actingAs(User::factory()->create());

        $model = Label::factory()->create();
        $body = Label::factory()->make()->toArray();
        $response = $this->put(route('labels.update', $model), $body);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('labels', [
            'id' => $model->id,
            ...$body,
        ]);
    }

    public function testDestroy(): void
    {
        $this->actingAs(User::factory()->create());

        $model = Label::factory()->create();
        $response = $this->delete(route('labels.destroy', $model));

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('labels', ['id' => $model->id]);
    }
}
