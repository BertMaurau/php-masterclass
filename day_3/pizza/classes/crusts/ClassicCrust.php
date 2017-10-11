<?php

/*
 * Copyright 2017 bertmaurau.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */


require_once __DIR__ . '/../Crust.php';

/**
 * Description of ClassicCrust
 *
 * @author bertmaurau
 */
class ClassicCrust extends Crust
{

    public function __construct()
    {
        parent::__construct(CRUST_CLASSIC);
    }

    public function bake()
    {
        return 'Baking on 160 degrees for 20 minutes and getting flipped around a couple of times';
    }

}
