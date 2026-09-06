<?php

function wf_stock_product_url($slug, $baseUrl = '')
{
    return rtrim((string) $baseUrl, '/') . '/manufacturing/' . rawurlencode($slug) . '/';
}

function wf_request_stock_slug()
{
    $path = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
    if (is_string($path) && preg_match('#/manufacturing/([a-z0-9-]+)/?$#', $path, $matches)) {
        return strtolower($matches[1]);
    }

    $script = basename($_SERVER['SCRIPT_NAME'] ?? '');
    if ($script === 'manufacturing-product.php' && !empty($_GET['slug'])) {
        return strtolower(trim((string) $_GET['slug']));
    }

    return '';
}

function wf_get_stock_product($slug)
{
    $slug = strtolower(trim((string) $slug));
    foreach (wf_stock_products() as $item) {
        if (($item['slug'] ?? '') === $slug) {
            return $item;
        }
    }

    return null;
}

function wf_stock_product_image($file, $baseUrl = '')
{
    return rtrim((string) $baseUrl, '/') . '/images/' . ltrim((string) $file, '/');
}

function wf_related_stock_products($slug, $limit = 3)
{
    $all = array_values(wf_stock_products());
    $count = count($all);
    if ($count < 2) {
        return [];
    }

    $index = 0;
    foreach ($all as $i => $item) {
        if (($item['slug'] ?? '') === $slug) {
            $index = $i;
            break;
        }
    }

    $related = [];
    for ($i = 1; $i < $count && count($related) < $limit; $i++) {
        $related[] = $all[($index + $i) % $count];
    }

    return $related;
}

function wf_home_solutions()
{
    return [
        [
            'title' => '90° Long Radius Elbow',
            'slug' => 'elbow-90',
            'image' => 'elbow90.jpg',
            'lines' => [
                'Designed to change piping direction by 90° with a smooth, long-radius transition.',
                'Ideal for process piping systems requiring reduced pressure drop and efficient flow.',
            ],
        ],
        [
            'title' => '90° Short Radius Elbow',
            'slug' => 'elbow-90',
            'image' => 'elbow90.jpg',
            'lines' => [
                'Provides a compact 90° directional change where installation space is limited.',
                'Suitable for industrial piping systems where a tighter turning radius is required.',
            ],
        ],
        [
            'title' => '45° Long Radius Elbow',
            'slug' => 'elbow-45',
            'image' => 'elbow45.jpg',
            'lines' => [
                'Changes the direction of pipeline flow by 45° with a smooth-radius profile.',
                'Commonly used to minimize turbulence and maintain efficient fluid flow.',
            ],
        ],
        [
            'title' => '180° Long Radius Return Bend',
            'slug' => 'return-bend',
            'image' => 'return-bend.jpg',
            'lines' => [
                'Provides a complete 180° change in flow direction with a gradual long-radius bend.',
                'Ideal for heat exchangers, process plants and piping systems requiring smooth return flow.',
            ],
        ],
        [
            'title' => '180° Short Radius Return Bend',
            'slug' => 'return-bend',
            'image' => 'return-bend.jpg',
            'lines' => [
                'Designed for a compact 180° reversal of pipeline flow in restricted spaces.',
                'Provides a space-efficient solution for industrial and process piping installations.',
            ],
        ],
        [
            'title' => 'Equal Tee',
            'slug' => 'tee',
            'image' => 'tee.jpg',
            'lines' => [
                'Connects three pipes of the same diameter to divide or combine fluid flow.',
                'Widely used in process, petrochemical, oil & gas and industrial piping systems.',
            ],
        ],
        [
            'title' => 'Reducing Tee',
            'slug' => 'reducing-tee',
            'image' => 'tee.jpg',
            'lines' => [
                'Connects a smaller branch pipe to a larger main pipeline through a welded connection.',
                'Provides reliable flow distribution between pipelines of different diameters.',
            ],
        ],
        [
            'title' => 'Concentric Reducer',
            'slug' => 'concentric-reducer',
            'image' => 'concentric-reducer.jpg',
            'lines' => [
                'Connects two pipes of different diameters while maintaining the same centerline.',
                'Commonly used in vertical piping, pump discharge and general process applications.',
            ],
        ],
        [
            'title' => 'Eccentric Reducer',
            'slug' => 'eccentric-reducer',
            'image' => 'eccentric-reducer.jpg',
            'lines' => [
                'Connects different pipe sizes while keeping one side of the fitting level.',
                'Ideal for horizontal piping and pump suction lines to help prevent air or vapor pockets.',
            ],
        ],
        [
            'title' => 'Pipe Cap',
            'slug' => 'cap',
            'image' => 'cap.jpg',
            'lines' => [
                'Designed to permanently close and seal the end of a pipeline or piping component.',
                'Provides a strong welded termination for high-pressure and demanding industrial applications.',
            ],
        ],
        [
            'title' => 'Stub End – Long Pattern',
            'slug' => 'stub-end',
            'image' => 'pipes.jpg',
            'lines' => [
                'Designed for use with lap joint flanges to provide a reliable welded piping connection.',
                'The long-pattern design provides an extended hub for improved installation flexibility.',
            ],
        ],
    ];
}

function wf_fitting_common()
{
    return [
        'category' => 'Butt Weld Fittings',
        'size' => '½″ – 48″ / Special Sizes on Request',
        'type' => 'Seamless / Welded',
        'standard' => 'ASME B16.9',
        'materials' => 'Stainless Steel / Duplex / Super Duplex / 6Mo / Nickel Alloy / Titanium / Carbon & Alloy Steel.',
        'wall' => 'SCH 10S – XXS / Special Thickness',
        'supply' => 'Worldwide',
        'story' => [
            'Precision Forming',
            'Controlled Heat Treatment',
            'Dimensional Accuracy',
            'Quality & Traceability',
        ],
    ];
}

function wf_fitting_product(array $item)
{
    $common = wf_fitting_common();
    $size = $item['size'] ?? $common['size'];
    $type = $item['type'] ?? $common['type'];
    $standard = $item['standard'] ?? $common['standard'];
    $materials = $item['materials'] ?? $common['materials'];
    $wall = $item['wall'] ?? $common['wall'];
    $supply = $item['supply'] ?? $common['supply'];
    $detailLabel = $item['detail_label'];
    $detailValue = $item['detail_value'];

    return [
        'slug' => $item['slug'],
        'image' => $item['image'],
        'title' => $item['title'],
        'sku' => $item['sku'],
        'category' => $common['category'],
        'description' => $item['description'],
        'page_title' => $item['page_title'],
        'meta_description' => $item['meta_description'],
        'specs' => [
            $standard,
            $size,
            $detailValue,
            $type,
        ],
        'highlights' => [
            ['label' => 'Size Range', 'value' => $size],
            ['label' => 'Type', 'value' => $type],
            ['label' => $detailLabel, 'value' => $detailValue],
            ['label' => 'Standard', 'value' => $standard],
        ],
        'accordion' => [
            [
                'title' => 'Product Detail',
                'rows' => [
                    ['label' => 'Size Range', 'value' => $size],
                    ['label' => 'Type', 'value' => $type],
                    ['label' => $detailLabel, 'value' => $detailValue],
                    ['label' => 'Standard', 'value' => $standard],
                ],
            ],
            [
                'title' => 'Materials',
                'copy' => $materials,
            ],
            [
                'title' => 'Wall Thickness',
                'copy' => $wall,
            ],
            [
                'title' => 'Supply',
                'copy' => $supply,
            ],
        ],
        'story' => $common['story'],
    ];
}

function wf_stock_products()
{
    return [
        wf_fitting_product([
            'slug' => 'elbow-90',
            'image' => 'elbow90.jpg',
            'title' => '90° Elbow',
            'sku' => 'FG-BW-90LR',
            'detail_label' => 'Radius',
            'detail_value' => '1.5D Long Radius',
            'description' => 'Precision-engineered 90° Elbows provide a smooth directional change in piping systems while minimizing turbulence and pressure loss. Manufactured for demanding oil & gas, petrochemical, chemical, power and industrial applications.',
            'page_title' => '90° Butt Weld Elbow Manufacturer | Deutsche Fittings GmbH',
            'meta_description' => 'Manufacturer of 90° butt weld elbows from ½″–48″ and special sizes in stainless steel, duplex, super duplex, 6Mo, nickel alloy, titanium and alloy steel.',
        ]),
        wf_fitting_product([
            'slug' => 'elbow-45',
            'image' => 'elbow45.jpg',
            'title' => '45° Elbow',
            'sku' => 'FG-BW-45LR',
            'detail_label' => 'Radius',
            'detail_value' => '1.5D Long Radius',
            'description' => 'Precision-engineered 45° Elbows provide a smooth directional change in piping systems while minimizing turbulence and pressure loss. Manufactured for demanding oil & gas, petrochemical, chemical, power and industrial applications.',
            'page_title' => '45° Butt Weld Elbow Manufacturer | Deutsche Fittings GmbH',
            'meta_description' => 'Manufacturer of 45° butt weld elbows for industrial piping systems, available from ½″–48″ and special sizes in a wide range of specialty materials.',
        ]),
        wf_fitting_product([
            'slug' => 'return-bend',
            'image' => 'return-bend.jpg',
            'title' => '180° Return Bend',
            'sku' => 'FG-BW-180RB',
            'detail_label' => 'Radius',
            'detail_value' => 'Long Radius / Short Radius',
            'description' => 'Precision-engineered 180° Return Bends provide a complete reversal of flow direction while maintaining a smooth and reliable transition. Manufactured for demanding oil & gas, petrochemical, chemical, power and industrial applications.',
            'page_title' => '180° Return Bend Manufacturer | Deutsche Fittings GmbH',
            'meta_description' => 'Manufacturer of 180° butt weld return bends for demanding piping applications, available in stainless steel, duplex, super duplex, 6Mo, nickel alloy and titanium.',
        ]),
        wf_fitting_product([
            'slug' => 'tee',
            'image' => 'tee.jpg',
            'title' => 'Equal Tee',
            'sku' => 'FG-BW-ET',
            'detail_label' => 'Configuration',
            'detail_value' => 'Equal Bore / 90° Branch',
            'description' => 'Precision-engineered Equal Tees provide a reliable 90° branch connection with equal pipe diameters across all three outlets. Manufactured for demanding oil & gas, petrochemical, chemical, power and industrial applications.',
            'page_title' => 'Equal Tee Manufacturer | Deutsche Fittings GmbH',
            'meta_description' => 'Manufacturer of butt weld equal tees from ½″–48″ and special sizes for oil & gas, petrochemical, chemical, power and industrial piping applications.',
        ]),
        wf_fitting_product([
            'slug' => 'reducing-tee',
            'image' => 'tee.jpg',
            'title' => 'Reducing Tee',
            'sku' => 'FG-BW-RT',
            'detail_label' => 'Configuration',
            'detail_value' => 'Reduced Branch / 90° Branch',
            'description' => 'Precision-engineered Reducing Tees provide a reliable 90° branch connection between pipes of different diameters, ensuring efficient flow distribution. Manufactured for demanding oil & gas, petrochemical, chemical, power and industrial applications.',
            'page_title' => 'Reducing Tee Manufacturer | Deutsche Fittings GmbH',
            'meta_description' => 'Manufacturer of butt weld reducing tees for reliable branch connections, available in stainless steel, duplex, super duplex, 6Mo, nickel alloy and titanium.',
        ]),
        wf_fitting_product([
            'slug' => 'concentric-reducer',
            'image' => 'concentric-reducer.jpg',
            'title' => 'Concentric Reducer',
            'sku' => 'FG-BW-CR',
            'detail_label' => 'Configuration',
            'detail_value' => 'Concentric / Common Centerline',
            'description' => 'Precision-engineered Concentric Reducers connect pipes of different diameters while maintaining a common centerline for smooth and efficient flow transition. Manufactured for demanding oil & gas, petrochemical, chemical, power and industrial applications.',
            'page_title' => 'Concentric Reducer Manufacturer | Deutsche Fittings GmbH',
            'meta_description' => 'Manufacturer of butt weld concentric reducers for smooth pipe size transitions, available from ½″–48″ and special sizes in advanced material grades.',
        ]),
        wf_fitting_product([
            'slug' => 'eccentric-reducer',
            'image' => 'eccentric-reducer.jpg',
            'title' => 'Eccentric Reducer',
            'sku' => 'FG-BW-ER',
            'detail_label' => 'Configuration',
            'detail_value' => 'Eccentric / Offset Centerline',
            'description' => 'Precision-engineered Eccentric Reducers connect pipes of different diameters while maintaining an offset centerline for smooth and controlled flow transition. Manufactured for demanding oil & gas, petrochemical, chemical, power and industrial applications.',
            'page_title' => 'Eccentric Reducer Manufacturer | Deutsche Fittings GmbH',
            'meta_description' => 'Manufacturer of butt weld eccentric reducers for industrial piping systems in stainless steel, duplex, super duplex, 6Mo, nickel alloy, titanium and alloy steel.',
        ]),
        wf_fitting_product([
            'slug' => 'cap',
            'image' => 'cap.jpg',
            'title' => 'Pipe Cap',
            'sku' => 'FG-BW-CAP',
            'detail_label' => 'Configuration',
            'detail_value' => 'Butt Weld End Closure',
            'description' => 'Precision-engineered Pipe Caps provide a secure and permanent closure at the end of piping systems while maintaining pressure integrity. Manufactured for demanding oil & gas, petrochemical, chemical, power and industrial applications.',
            'page_title' => 'Butt Weld Pipe Cap Manufacturer | Deutsche Fittings GmbH',
            'meta_description' => 'Manufacturer of butt weld pipe caps for secure piping system closures, available from ½″–48″ and special sizes for demanding industrial applications.',
        ]),
        wf_fitting_product([
            'slug' => 'outlet',
            'image' => 'outlet.jpg',
            'title' => 'Outlet',
            'sku' => 'FG-BW-OUT',
            'detail_label' => 'Configuration',
            'detail_value' => 'Branch Outlet / Butt Weld Connection',
            'standard' => 'ASME / MSS / Project Specification',
            'description' => 'Precision-engineered Butt Weld Outlets provide a strong and reliable branch connection from the main run pipe for efficient flow distribution. Manufactured for demanding oil & gas, petrochemical, chemical, power and industrial applications.',
            'page_title' => 'Butt Weld Outlet Manufacturer | Deutsche Fittings GmbH',
            'meta_description' => 'Manufacturer of engineered butt weld outlets for reliable branch connections in oil & gas, petrochemical, chemical, power and industrial piping systems.',
        ]),
        wf_fitting_product([
            'slug' => 'stub-end',
            'image' => 'pipes.jpg',
            'title' => 'Stub End',
            'sku' => 'FG-BW-SE',
            'detail_label' => 'Configuration',
            'detail_value' => 'Long Pattern / Short Pattern',
            'description' => 'Precision-engineered Stub Ends are designed for use with lap joint flanges, providing a reliable and flexible butt-weld connection in piping systems. Manufactured for demanding oil & gas, petrochemical, chemical, power and industrial applications.',
            'page_title' => 'Butt Weld Stub End Manufacturer | Deutsche Fittings GmbH',
            'meta_description' => 'Manufacturer of butt weld stub ends for lap joint flange connections, available in stainless steel, duplex, super duplex, 6Mo, nickel alloy and titanium.',
        ]),
        wf_fitting_product([
            'slug' => 'cross',
            'image' => 'tee.jpg',
            'title' => 'Cross',
            'sku' => 'FG-BW-CROSS',
            'detail_label' => 'Configuration',
            'detail_value' => 'Equal Cross / Reducing Cross',
            'description' => 'Precision-engineered Butt Weld Crosses provide four-way branch connections for efficient distribution or collection of flow within piping systems. Manufactured for demanding oil & gas, petrochemical, chemical, power and industrial applications.',
            'page_title' => 'Butt Weld Cross Manufacturer | Deutsche Fittings GmbH',
            'meta_description' => 'Manufacturer of equal and reducing butt weld crosses for industrial piping systems, available from ½″–48″ and in special sizes on request.',
        ]),
        wf_fitting_product([
            'slug' => 'lateral-tee',
            'image' => 'elbow45.jpg',
            'title' => 'Lateral Tee',
            'sku' => 'FG-BW-LT',
            'detail_label' => 'Configuration',
            'detail_value' => '45° Lateral / Reducing Lateral',
            'standard' => 'ASME / MSS / Project Specification',
            'description' => 'Precision-engineered Lateral Tees provide an angled branch connection from the main pipeline, enabling smooth and efficient flow distribution. Manufactured for demanding oil & gas, petrochemical, chemical, power and industrial applications.',
            'page_title' => 'Lateral Tee Manufacturer | Deutsche Fittings GmbH',
            'meta_description' => 'Manufacturer of butt weld lateral tees for engineered branch connections, available in specialty materials and custom sizes for demanding piping applications.',
        ]),
    ];
}
