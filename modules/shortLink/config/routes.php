<?php

return [
    'GET api/v1/link/<uid:[A-Za-z0-9]{6}>' => 'shortLink/api/v1/link/get',
    'POST api/v1/link/create' => 'shortLink/api/v1/link/create',
];
