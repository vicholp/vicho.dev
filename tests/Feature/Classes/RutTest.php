<?php

use App\Classes\Rut;

test('random', function () {
    $rut = Rut::random();

    $this->assertTrue($rut->isValid());
});
