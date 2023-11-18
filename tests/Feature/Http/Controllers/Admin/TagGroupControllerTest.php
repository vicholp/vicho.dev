<?php

use App\Models\Admin;
use App\Models\TagGroup;

beforeEach(fn () => $this->user = Admin::factory()->create()->user);

describe('index action', function () {
    test('when there are no tag groups', function () {
        $this->actingAs($this->user)
            ->get(route('admin.tag-groups.index'))
            ->assertOk()
            ->assertViewIs('admin.tag-groups.index')
            ->assertViewHas('tagGroups');
    });

    test('when there are tag groups', function () {
        TagGroup::factory()->count(3)->create();

        $this->actingAs($this->user)
            ->get(route('admin.tag-groups.index'))
            ->assertOk()
            ->assertViewIs('admin.tag-groups.index')
            ->assertViewHas('tagGroups');
    });
});

describe('show action', function () {
    test('when tag group exists', function () {
        $tagGroup = TagGroup::factory()->create();

        $this->actingAs($this->user)
            ->get(route('admin.tag-groups.show', $tagGroup))
            ->assertOk()
            ->assertViewIs('admin.tag-groups.show')
            ->assertViewHas('tagGroup');
    });
});
