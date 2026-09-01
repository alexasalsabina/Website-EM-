<?php

namespace Tests\Feature;

use Tests\TestCase;

class EventPageTest extends TestCase
{
    public function test_event_index_page_loads(): void
    {
        $response = $this->get('/event');

        $response->assertOk();
    }

    public function test_galeri_page_loads(): void
    {
        $response = $this->get('/galeri');

        $response->assertOk();
    }
}
