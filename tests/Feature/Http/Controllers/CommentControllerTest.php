<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CommentController
 */
class CommentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $comments = Comment::factory()->count(3)->create();

        $response = $this->get(route('comment.index'));

        $response->assertOk();
        $response->assertViewIs('comment.index');
        $response->assertViewHas('comments');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('comment.create'));

        $response->assertOk();
        $response->assertViewIs('comment.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CommentController::class,
            'store',
            \App\Http\Requests\CommentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $comment = $this->faker->word;

        $response = $this->post(route('comment.store'), [
            'comment' => $comment,
        ]);

        $comments = Comment::query()
            ->where('comment', $comment)
            ->get();
        $this->assertCount(1, $comments);
        $comment = $comments->first();

        $response->assertRedirect(route('comment.index'));
        $response->assertSessionHas('comment.id', $comment->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $comment = Comment::factory()->create();

        $response = $this->get(route('comment.show', $comment));

        $response->assertOk();
        $response->assertViewIs('comment.show');
        $response->assertViewHas('comment');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $comment = Comment::factory()->create();

        $response = $this->get(route('comment.edit', $comment));

        $response->assertOk();
        $response->assertViewIs('comment.edit');
        $response->assertViewHas('comment');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CommentController::class,
            'update',
            \App\Http\Requests\CommentUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $comment = Comment::factory()->create();
        $comment = $this->faker->word;

        $response = $this->put(route('comment.update', $comment), [
            'comment' => $comment,
        ]);

        $comment->refresh();

        $response->assertRedirect(route('comment.index'));
        $response->assertSessionHas('comment.id', $comment->id);

        $this->assertEquals($comment, $comment->comment);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $comment = Comment::factory()->create();

        $response = $this->delete(route('comment.destroy', $comment));

        $response->assertRedirect(route('comment.index'));

        $this->assertDeleted($comment);
    }
}
