<?php

use App\Models\Admin;
use App\Models\Tag;
use App\Models\TagGroup;

beforeEach(fn () => $this->user = Admin::factory()->create()->user);

describe('create action', function () {
    test('show view', function () {
        $tagGroup = TagGroup::factory()->create();

        $this->actingAs($this->user)
            ->get(route('admin.tag-groups.tags.create', $tagGroup))
            ->assertOk()
            ->assertViewIs('admin.tag-groups.tags.create')
            ->assertViewHas('tagGroup', $tagGroup);
    });
});

describe('store action', function () {
    test('store it when valid data is passed', function () {
        $tagGroup = TagGroup::factory()->create();
        $tag = Tag::factory()->make();

        $this->actingAs($this->user)
            ->post(route('admin.tag-groups.tags.store', $tagGroup), $tag->toArray());
    })->todo();
});
