<?php

function wf_product_url($slug, $baseUrl = '')
{
    return rtrim((string) $baseUrl, '/') . '/products/' . rawurlencode($slug) . '/';
}

function wf_products_listing_url($baseUrl = '')
{
    return rtrim((string) $baseUrl, '/') . '/products/';
}

function wf_request_product_slug()
{
    if (!empty($_GET['slug'])) {
        return strtolower(trim((string) $_GET['slug']));
    }

    $path = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
    if (is_string($path) && preg_match('#/products/([a-z0-9-]+)/?$#', $path, $matches)) {
        return strtolower($matches[1]);
    }

    return '';
}

function wf_product_image($file, $baseUrl = '')
{
    return rtrim((string) $baseUrl, '/') . '/images/products/' . ltrim($file, '/');
}

function wf_shared_alloys()
{
    return [
        'Hastelloy – C276, B3, C22, C-2000, G-30, 230',
        'Alloy 20, 200/201, 400, 600, 601, 625, 800HT, 825',
        'AL6XN (N08367), 904L, 310, 317L, 321, 347',
        'Duplex Stainless – 2205, 2507, 255',
        'Titanium – Grades 2, 7, and 12',
        'Aluminum Grades – 1100, 3003, 6061 and 5083',
        'Chromes-Moly – F-5, F-9, F-11 and F-22',
    ];
}

function wf_shared_certs()
{
    return [
        'ISO 9001:2015, PED 2014/68/EU, Canadian Registration Numbers (CRN’s: Nuclear and Non-Nuclear), AIS, NCA3800, 10CFR50, 10CFR21, CSA N285.0, CSA B51, NQA-1, EB2678, MIL-I-45208A, DFARS, NACE, EN 10204 3.1',
    ];
}

function wf_products()
{
    $alloys = wf_shared_alloys();
    $certs = wf_shared_certs();

    return [
        'weld-neck-flanges' => [
            'slug' => 'weld-neck-flanges',
            'nav' => 'Weld Neck',
            'category' => 'Flange',
            'hero_title' => 'Weld Neck',
            'heading' => 'Weld Neck Flanges',
            'spec_title' => 'Weld Neck Flange',
            'page_title' => 'Weld-Neck Flanges | Deutsche Fittings GmbH',
            'image' => 'weld-neck.png',
            'paragraphs' => [
                'Also known as a high-hub flange or a tapered hub flange, weld-neck flanges are designed to be joined to a piping system by butt-welding. Weld Neck flanges are preferred when piping is subject to high stresses, high-pressures or subzero/elevated temperatures. The neck, or hub, helps to transmit environmental stress at the flange with the pipe to which it is welded to. The gradual transition of thickness from the base of the hub to the wall thickness at the butt weld provides important reinforcement of the flange. Turbulence and erosion are reduced due to the matching bore size of the pipe and flange. These flanges are bored to match the ID of the mating pipe so there is no restriction of flow.',
            ],
            'dimensions' => ['B16.5 / B16.47', '½” – 36″', '150# – 2500#', 'Series A & Series B'],
            'alloys' => $alloys,
            'certs' => $certs,
        ],
        'slip-on-flanges' => [
            'slug' => 'slip-on-flanges',
            'nav' => 'Slip-On',
            'category' => 'Flange',
            'hero_title' => 'Slip-On',
            'heading' => 'Slip-On Flanges',
            'spec_title' => 'Slip-On Flange',
            'page_title' => 'Slip-On Flanges | Deutsche Fittings GmbH',
            'image' => 'slip-on.png',
            'paragraphs' => [
                'Are slipped over the pipe and then welded from both inside and outside to provide sufficient strength and prevent leakage. This flange is used instead of weld necks by many users because of its lower cost and also the fact that it requires less accuracy when cutting pipe to length. Slip-Ons are not normally used in high-stress applications due to low hub and weld attachment.',
            ],
            'dimensions' => ['B16.5 / B16.47', '½” – 36″', '150# – 2500#', 'Series A & Series B'],
            'dimension_note' => 'Series B available per customer specifications.',
            'alloys' => $alloys,
            'certs' => $certs,
        ],
        'blind-flanges' => [
            'slug' => 'blind-flanges',
            'nav' => 'Blind',
            'category' => 'Flange',
            'hero_title' => 'Blind',
            'heading' => 'Blind Flanges',
            'spec_title' => 'Blind Flange',
            'page_title' => 'Blind Flanges | Deutsche Fittings GmbH',
            'image' => 'blind.png',
            'paragraphs' => [
                'Blind Flanges do not have a bore and are used to shut off a piping system or vessel opening. Its design permits easy access to vessel or piping system for inspection purposes. It can be supplied with or without hubs at the manufacturer’s option. In terms of internal pressure and bolt loading, blind flanges, especially in the larger sizes, are the most highly stressed flange types.',
            ],
            'dimensions' => ['B16.5 / B16.47', '½” – 36″', '150# – 2500#', 'Series A & Series B'],
            'alloys' => $alloys,
            'certs' => $certs,
        ],
        'socket-weld-flanges' => [
            'slug' => 'socket-weld-flanges',
            'nav' => 'Socket Weld',
            'category' => 'Flange',
            'hero_title' => 'Socket Weld',
            'heading' => 'Socket Weld Flanges',
            'spec_title' => 'Socket Weld Flange',
            'page_title' => 'Socket-Weld Flanges | Deutsche Fittings GmbH',
            'image' => 'socket-weld.png',
            'paragraphs' => [
                'Similar to a slip-on flange in design, but with a bore that is counter-bored to accept pipe. The diameter of the remaining bore is the same as the inside diameter of the pipe. A fillet weld around the hub of the flange attaches the flange to the pipe. An optional internal weld may be applied in high stress applications. Its biggest use is in high pressure systems such as hydraulic and steam lines.',
            ],
            'dimensions' => ['B16.5', '½” – 12″', '150# – 2500#'],
            'dimension_note' => '12″ and larger available per customer specifications.',
            'alloys' => $alloys,
            'certs' => $certs,
        ],
        'threaded-flanges' => [
            'slug' => 'threaded-flanges',
            'nav' => 'Threaded',
            'category' => 'Flange',
            'hero_title' => 'Threaded',
            'heading' => 'Threaded Flanges',
            'spec_title' => 'Threaded Flange',
            'page_title' => 'Threaded Flanges | Deutsche Fittings GmbH',
            'image' => 'threaded.png',
            'paragraphs' => [
                'Used for special circumstances with their main advantage being that they can be attached to the pipe without welding. Sometimes a seal weld is also used in conjunction with the threaded connection. Although available in most sizes and pressure rating, threaded flanges today are used almost exclusively in smaller pipe sizes. Threaded flanges are not suitable for piping with thin wall thicknesses because cutting a thread on the pipe is not possible.',
            ],
            'dimensions' => ['B16.5', '½” – 8″', '150# – 2500#'],
            'dimension_note' => '6″ and larger available per customer specifications.',
            'alloys' => $alloys,
            'certs' => $certs,
        ],
        'lap-joint-flanges' => [
            'slug' => 'lap-joint-flanges',
            'nav' => 'Lap Joint',
            'category' => 'Flange',
            'hero_title' => 'Lap Joint',
            'heading' => 'Lap Joint Flanges',
            'spec_title' => 'Lap Joint Flange',
            'page_title' => 'Lap Joint Flanges | Deutsche Fittings GmbH',
            'image' => 'lap-joint.png',
            'paragraphs' => [
                'Nearly identical to a slip-on flange, but having a radius at the intersection of the bore and the flange face to accommodate a lap stub end. These flanges slip over the pipe and are not otherwise welded or fastened to it. Bolting pressure is transmitted to the gasket by the pressure of the flange against the back of the pipe lap (stub-end). The face on the stub-end forms the gasket face of the flange. Lap-Joint flanges do not have raised faces and a single connection requires both lap-joint flange and a pipe stub-end. They are best used where sections of piping systems need to be dismantled quickly and easily for inspection or replacement.',
            ],
            'dimensions' => ['B16.5', '½” – 24″', '150# – 2500#'],
            'dimension_note' => '24″ and larger available per customer specifications.',
            'alloys' => $alloys,
            'certs' => $certs,
        ],
        'stub-end-flanges' => [
            'slug' => 'stub-end-flanges',
            'nav' => 'Stub End',
            'category' => 'Flange',
            'hero_title' => 'Stub End',
            'heading' => 'Stub Ends',
            'spec_title' => 'Stub End',
            'page_title' => 'Stub-End Flanges | Deutsche Fittings GmbH',
            'image' => 'stub-end.png',
            'paragraphs' => [
                'Lap joint stub ends are fittings used in place of welded flanges where rotating back up flanges are required or to minimize the weight of high-grade materials. The lap joint flange can be rotated on the pipe and simplify the alignment of the bolt holes of the mating flanges. Stub Ends typically come in two design categories; ASA B16.9 or MSS SP-43. These are often referred to as “long pattern” (ASA) or “short pattern” (MSS). The most requested design at Deutsche Fittings GmbH is typically the short pattern MSS style.',
            ],
            'dimensions' => ['B16.9 – ASA or MSS', '½” – 24″'],
            'dimension_note' => '24″ and larger available per customer specifications.',
            'alloys' => $alloys,
            'certs' => $certs,
        ],
        'studding-outlet-flanges' => [
            'slug' => 'studding-outlet-flanges',
            'nav' => 'Studding Outlet',
            'category' => 'Flange',
            'hero_title' => 'Studding Outlet',
            'heading' => 'Studding Outlet Flanges',
            'spec_title' => 'Studding Outlet Flange',
            'page_title' => 'Studding Outlet Flanges | Deutsche Fittings GmbH',
            'image' => 'studding-outlet.png',
            'paragraphs' => [
                'Studding Outlet Flanges are usually designed to be installed in the inside or outside of vessels and tanks. These are made to order items offered in a variety of configurations. The most commonly used studding outlet flange in the industry is the flat bottom type. We also offer them in a head mount in order to set the flanges flush with your vessel.',
            ],
            'dimensions' => ['B16.5 (unless otherwise stated)', '½” – 24″', '150# – 2500#'],
            'dimension_note' => 'Flat bottom or head mount available. Furnished to B16.5 specifications unless otherwise stated.',
            'alloys' => $alloys,
            'certs' => $certs,
        ],
        'long-weld-neck-flanges' => [
            'slug' => 'long-weld-neck-flanges',
            'nav' => 'Long Weld Neck',
            'category' => 'Flange',
            'hero_title' => 'Long Weld Neck',
            'heading' => 'Long Weld Neck Flanges',
            'spec_title' => 'Long Weld Neck Flange',
            'page_title' => 'Long Weld Neck Flanges | Deutsche Fittings GmbH',
            'image' => 'long-weld-neck.png',
            'paragraphs' => [
                'Long weld necks are similar to weld neck flanges, with the exception that the neck is lengthened and acts like a boring extension. Long weld neck flanges are generally used on vessels, columns or barrels. In critical applications where working temperature, mechanical stress, and corrosion factors are elevated, heavy barrel (HB) and equal barrel (E) types might be utilized for their thicker barrels and increased support capacity.',
            ],
            'dimensions' => ['B16.5', '½” – 24″', '150# – 2500#'],
            'dimension_note' => 'Barrel length up to 24″.',
            'alloys' => $alloys,
            'certs' => $certs,
        ],
        'orifice-set-flanges' => [
            'slug' => 'orifice-set-flanges',
            'nav' => 'Orifice Set',
            'category' => 'Flange',
            'hero_title' => 'Orifice Set',
            'heading' => 'Orifice Flange Sets',
            'spec_title' => 'Orifice Flange',
            'page_title' => 'Orifice Set Flanges | Deutsche Fittings GmbH',
            'image' => 'orifice-set.png',
            'paragraphs' => [
                'Orifice Flanges are used with orifice meters for the purpose of measuring the flow rate of either liquids or gases in the respective pipeline. Pairs of pressure “Tappings”, mostly on 2 sides, directly opposite each other, are machined into the orifice flange. This makes separate orifice carriers or tappings in the pipe wall unnecessary.',
                'Orifice Flanges generally come with either Raised Faces or RTJ (Ring Type Joint) facings. They are, for all intents and purposes, the same as weld neck and slip on flanges with extra machining.',
            ],
            'dimensions' => ['B16.36', '½” – 24″', '150# – 2500#'],
            'dimension_note' => 'Socket weld or threaded taps available.',
            'alloys' => $alloys,
            'certs' => $certs,
        ],
        'other-flanges' => [
            'slug' => 'other-flanges',
            'nav' => 'Other Flanges & Non-Standard Products',
            'category' => 'Flange',
            'hero_title' => 'Other Flanges',
            'heading' => 'Other Flanges and Non-Standard Products',
            'spec_title' => 'Non-Standard Products',
            'page_title' => 'Other Flanges & Non-Standard Products | Deutsche Fittings GmbH',
            'image' => 'other-flanges.png',
            'paragraphs' => [
                'Deutsche Fittings GmbH manufactures specialized and non-standard flanges to drawing, including military and international specifications. Tell us the facing, size, and alloy you need and we will forge it to spec.',
            ],
            'groups' => [
                [
                    'title' => 'Flanges',
                    'items' => [
                        'Expanding Flanges',
                        'Reducing Flanges',
                        'Nipolet Flanges',
                        'Lightweight Class Flanges',
                        'Navy Flanges and Military Specifications',
                        'DIN, JIS, and API Flanges',
                        'Custom Forgings and Flanges made to Drawings',
                    ],
                ],
                [
                    'title' => 'Facings',
                    'items' => [
                        'Ring Type Joint (RTJ)',
                        'Male / Female',
                        'Tongue / Groove',
                    ],
                ],
            ],
        ],
    ];
}

function wf_get_product($slug)
{
    $products = wf_products();
    return $products[$slug] ?? null;
}
