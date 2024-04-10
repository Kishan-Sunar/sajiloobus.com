<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\BusPhoto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BusPhotoController
 */
final class BusPhotoControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $busPhotos = BusPhoto::factory()->count(3)->create();

        $response = $this->get(route('bus-photos.index'));

        $response->assertOk();
        $response->assertViewIs('busPhoto.index');
        $response->assertViewHas('busPhotos');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('bus-photos.create'));

        $response->assertOk();
        $response->assertViewIs('busPhoto.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BusPhotoController::class,
            'store',
            \App\Http\Requests\BusPhotoControllerStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name();
        $photo_path = $this->faker->text();
        $bus_no = $this->faker->word();

        $response = $this->post(route('bus-photos.store'), [
            'name' => $name,
            'photo_path' => $photo_path,
            'bus_no' => $bus_no,
        ]);

        $busPhotos = BusPhoto::query()
            ->where('name', $name)
            ->where('photo_path', $photo_path)
            ->where('bus_no', $bus_no)
            ->get();
        $this->assertCount(1, $busPhotos);
        $busPhoto = $busPhotos->first();

        $response->assertRedirect(route('busPhotos.index'));
        $response->assertSessionHas('busPhoto.id', $busPhoto->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $busPhoto = BusPhoto::factory()->create();

        $response = $this->get(route('bus-photos.show', $busPhoto));

        $response->assertOk();
        $response->assertViewIs('busPhoto.show');
        $response->assertViewHas('busPhoto');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $busPhoto = BusPhoto::factory()->create();

        $response = $this->get(route('bus-photos.edit', $busPhoto));

        $response->assertOk();
        $response->assertViewIs('busPhoto.edit');
        $response->assertViewHas('busPhoto');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BusPhotoController::class,
            'update',
            \App\Http\Requests\BusPhotoControllerUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $busPhoto = BusPhoto::factory()->create();
        $name = $this->faker->name();
        $photo_path = $this->faker->text();
        $bus_no = $this->faker->word();

        $response = $this->put(route('bus-photos.update', $busPhoto), [
            'name' => $name,
            'photo_path' => $photo_path,
            'bus_no' => $bus_no,
        ]);

        $busPhoto->refresh();

        $response->assertRedirect(route('busPhotos.index'));
        $response->assertSessionHas('busPhoto.id', $busPhoto->id);

        $this->assertEquals($name, $busPhoto->name);
        $this->assertEquals($photo_path, $busPhoto->photo_path);
        $this->assertEquals($bus_no, $busPhoto->bus_no);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $busPhoto = BusPhoto::factory()->create();

        $response = $this->delete(route('bus-photos.destroy', $busPhoto));

        $response->assertRedirect(route('busPhotos.index'));

        $this->assertModelMissing($busPhoto);
    }
}
