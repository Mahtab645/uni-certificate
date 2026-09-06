<?php

function ifta_standards()
{
    return [
        'iso-9001' => [
            'slug' => 'iso-9001',
            'file' => 'iso-9001.php',
            'code' => 'ISO 9001',
            'title' => 'Quality management according to DIN EN ISO 9001',
            'nav' => 'DIN EN ISO 9001',
            'summary' => 'A systematic approach to controlling and improving the quality of products, services and processes, based on the international ISO 9001 standard.',
            'description' => 'IFTA AG certifies quality management systems according to DIN EN ISO 9001 for agriculture, food, healthcare, industry, trade, services, education and social services.',
            'paragraphs' => [
                'Quality management according to DIN EN ISO 9001 is a systematic approach to controlling and improving the quality of products, services, and processes within an organization. It is based on the international standard ISO 9001, which specifies requirements for a quality management system (QMS) in order to increase customer satisfaction and improve efficiency.',
            ],
            'sectors' => [
                'Agriculture, animal feed and food industry',
                'Medical and healthcare',
                'Industry, trade and services',
                'Education and social services',
            ],
        ],
        'iso-14001' => [
            'slug' => 'iso-14001',
            'file' => 'iso-14001.php',
            'code' => 'ISO 14001',
            'title' => 'Environmental management according to DIN EN ISO 14001',
            'nav' => 'DIN EN ISO 14001',
            'summary' => 'An environmental management system that organizes all environmentally relevant activities, with measurable goals and continuous improvement.',
            'description' => 'IFTA AG certifies environmental management systems according to DIN EN ISO 14001 for agriculture, food, industry, trade, services, energy and environment.',
            'paragraphs' => [
                'The DIN EN ISO 14001 standard organizes the implementation of an environmental management system. It organizes all environmental activities of the company. The basic requirement is the establishment of an environmental policy and definition of measurable environmental goals, which shall be reached by implementing the environmental management system. The environmental management system and accompanying regulations are subject to a continuous improvement process.',
                'Congruent with DIN EN ISO 9001, DIN EN ISO 14001 follows a process-oriented approach that considers the individual environmental impacts of the company. In doing so it systematizes, controls and monitors the constant analysis of material and energy flows and the gradual reduction of waste, wastewater or emissions.',
                'DIN EN ISO 9001 and DIN EN ISO 14001 can be combined well as an integrated management system. They are also complemented by DIN EN ISO 50001 (Energy Management).',
            ],
            'sectors' => [
                'Agriculture, animal feed and food industry',
                'Industry, trade and services',
                'Sustainability, energy and environment',
            ],
        ],
        'iso-22000' => [
            'slug' => 'iso-22000',
            'file' => 'iso-22000.php',
            'code' => 'ISO 22000 / FSSC 22000',
            'title' => 'Food safety according to DIN EN ISO 22000 and FSSC 22000',
            'nav' => 'DIN EN ISO 22000 & FSSC 22000',
            'summary' => 'Audits that confirm food-safety management according to DIN EN ISO 22000 or the GFSI-recognized FSSC 22000 scheme.',
            'description' => 'IFTA AG is a partner for DIN EN ISO 22000 and FSSC 22000 audits, confirming food-safety management systems in processing and related industries.',
            'paragraphs' => [
                'The production of safe food is the top priority when applying certification standards in the food industry. In addition, they help to optimize your own business processes and meet customer requirements. IFTA AG is your reliable partner for conducting DIN EN ISO 22000 or FSSC 22000 audits. This confirms the conformity of the food safety standard introduced in your company — a decisive factor in building trust among customers, authorities, and the public.',
                'Within the ISO family, DIN EN ISO 22000 is the standard that deals directly with food safety management systems. DIN EN ISO 22000 is based on DIN EN ISO 9001. It expands on the requirements, particularly with regard to HACCP and the associated process organization. Like many ISO standards, DIN EN ISO 22000 allows a certain amount of leeway in the implementation of the requirements and promotes the internal continuous improvement process.',
                'FSSC 22000 is a GFSI-recognized food safety standard based on the requirements of DIN EN ISO 22000 and ISO/TS 22002-1. IFTA AG offers certification of management systems in the field of food processing.',
            ],
            'list_title' => 'The advantages of FSSC 22000 certification',
            'list' => [
                'Protecting your company from risks with an international certification system for food safety management systems',
                'Recognition of the FSSC 22000 standard by the Global Food Safety Initiative (GFSI)',
                'Conducting high-quality audits under the responsibility of a licensed certification body and qualified auditors',
                'FSSC 22000 combines DIN EN ISO 22000 (for food safety management systems), which includes the HACCP principles of the Codex Alimentarius, with preventive programs from ISO/TS 22002 and additional requirements of its own',
            ],
            'more' => [
                'label' => 'Further information on the FSSC 22000 standard',
                'url' => 'https://www.fssc.com/schemes/fssc-22000/',
            ],
            'sectors' => [
                'Agriculture, animal feed and food industry',
                'Industry, trade and services',
            ],
        ],
        'iso-50001' => [
            'slug' => 'iso-50001',
            'file' => 'iso-50001.php',
            'code' => 'ISO 50001',
            'title' => 'Energy management according to DIN EN ISO 50001',
            'nav' => 'DIN EN ISO 50001',
            'summary' => 'Requirements for introducing, maintaining and improving an energy management system to reduce consumption, cost and environmental impact.',
            'description' => 'IFTA AG certifies energy management systems according to DIN EN ISO 50001 across agriculture, healthcare, industry, trade and sustainability.',
            'paragraphs' => [
                'DIN EN ISO 50001 is an international standard for energy management systems (EnMS). It specifies requirements for the introduction, implementation, maintenance, and improvement of an EnMS to help organizations systematically improve their energy-related performance. The aim is to reduce energy consumption and energy costs and to reduce environmental impact.',
            ],
            'sectors' => [
                'Agriculture, animal feed and food industry',
                'Medical and healthcare',
                'Industry, trade and services',
                'Sustainability, energy and environment',
            ],
        ],
        'znu' => [
            'slug' => 'znu',
            'file' => 'znu.php',
            'code' => 'ZNU',
            'title' => 'ZNU Standard for Sustainable Management',
            'nav' => 'ZNU Standard',
            'summary' => 'A holistic management process for sustainable business, integrating environment, economy and social issues.',
            'description' => 'IFTA AG certifies the ZNU Standard Driving Sustainable Change — a holistic process for environment, economy and social performance.',
            'paragraphs' => [
                'The ZNU Standard Driving Sustainable Change is a certification standard for companies that promotes a holistic management process for sustainable management. It integrates the three dimensions of sustainability — environment, economy, and social issues — and enables companies to improve step by step and make their sustainability performance transparent.',
            ],
            'more' => [
                'label' => 'Further information on the ZNU Standard Driving Sustainable Change',
                'url' => 'https://mehrwert-nachhaltigkeit.de/znu-standard',
            ],
            'sectors' => [
                'Agriculture, animal feed and food industry',
                'Medical and healthcare',
                'Industry, trade and services',
                'Sustainability, energy and environment',
            ],
        ],
        'qs' => [
            'slug' => 'qs',
            'file' => 'qs.php',
            'code' => 'QS',
            'title' => 'QS – Quality and Safety',
            'nav' => 'QS – Quality and Safety',
            'summary' => 'A cross-stage quality assurance system for food, covering feed, agriculture, processing and retail.',
            'description' => 'IFTA AG offers QS certification across the meat and meat-products chain: feed, poultry farming, meat industry and pet food.',
            'paragraphs' => [
                'The QS system is a cross-stage quality assurance system for foodstuffs and covers all areas of the production and marketing chain — from the feed industry and agriculture through to processing and retail.',
                'The aim of the system is to ensure consistent food quality and safety. To this end, QS defines binding requirements for all market participants involved. Compliance is ensured by a three-tier control system:',
            ],
            'list' => [
                'In-plant self-assessment',
                'Independent audits by accredited certification bodies',
                'Monitoring and system checks by the standard-setting body',
            ],
            'more' => [
                'label' => 'Further information on the QS system',
                'url' => 'https://www.q-s.de/',
            ],
            'services_intro' => 'As an experienced certification body, we offer certification services across the meat and meat products supply chain in the following areas.',
            'scopes' => [
                [
                    'title' => 'Feed industry',
                    'text' => 'Feed forms the basis for the production of safe food of animal origin. The QS system therefore takes all relevant processes into account. A QS certification can also serve as the basis for accreditation within the GMP+ system. This requires participation in both systems as well as an annual audit by an accredited certification body such as IFTA AG.',
                    'items' => [
                        'Production of feed material and compound feed',
                        'Transport, storage and transshipment',
                        'Feed trade',
                        'Private labelling',
                        'Mobile feed milling and mixing plants',
                    ],
                ],
                [
                    'title' => 'Livestock farming (poultry)',
                    'text' => 'Animal-friendly husbandry, regular veterinary visits, hygiene checks and the responsible use of medicines are among the most important QS requirements for livestock farmers. Participation by livestock farmers and transport companies in the QS scheme is usually via so-called coordinators. We also offer certification for coordinators as part of our range of services.',
                    'items' => [
                        'Breeder farming',
                        'Hatcheries',
                        'Animal transport',
                        'Poultry farming (rearing and production of broilers, turkeys and ducks)',
                    ],
                ],
                [
                    'title' => 'Meat industry',
                    'text' => 'Animals must be slaughtered in accordance with animal welfare standards. Strict hygiene rules apply to meat processing establishments. Furthermore, the produce must be kept continuously chilled, properly packaged, clearly labelled and correctly stored.',
                    'items' => [
                        'Slaughter and cutting',
                        'Processing',
                        'Butchery',
                        'Meat wholesale',
                        'Broker',
                        'Logistics for meat and meat products',
                        'Food retail',
                        'Convenience',
                    ],
                ],
                [
                    'title' => 'Pet food',
                    'text' => 'QS also offers a quality and process assurance programme for the production of dog and cat food for companies in the pet food industry. The programme covers the entire value chain of pet food production.',
                    'items' => [
                        'Transport (raw material pet food)',
                        'Storage (raw material pet food)',
                        'Processing plant (raw materials pet food)',
                        'Pet-food plant',
                        'Wholesale (pet food)',
                        'Private labelling (pet food)',
                        'Broker (pet food)',
                    ],
                ],
            ],
        ],
        'itw' => [
            'slug' => 'itw',
            'file' => 'itw.php',
            'code' => 'ITW',
            'title' => 'ITW — Animal Welfare Initiative',
            'nav' => 'ITW — Animal Welfare Initiative',
            'summary' => 'A cross-industry programme for greater animal welfare in livestock farming, with inspection and product labelling.',
            'description' => 'IFTA AG certifies Initiative Tierwohl (ITW) for poultry farming, the meat industry and pet food.',
            'paragraphs' => [
                'The Initiative Tierwohl (ITW) is a cross-industry alliance for greater animal welfare in livestock farming. It involves representatives from agriculture, the meat industry, food retail and the restaurant industry. The aim is to improve living conditions for farm animals in conventional operations step by step. The initiative is a support programme, an inspection system, and the issuer of its own product seal.',
            ],
            'more' => [
                'label' => 'Further information on the Animal Welfare Initiative',
                'url' => 'https://initiative-tierwohl.de/',
            ],
            'services_intro' => 'As an experienced certification body, we offer certification in the following areas.',
            'scopes' => [
                [
                    'title' => 'Agriculture — poultry',
                    'text' => 'Livestock farmers participating in the Initiative Tierwohl must implement specific animal welfare criteria. These all exceed the legal standards. Compliance with the criteria is checked twice a year by independent auditors.',
                    'items' => [
                        'Broiler production',
                        'Turkey production',
                        'Peking duck production',
                    ],
                ],
                [
                    'title' => 'Meat industry',
                    'text' => 'All companies in the meat industry are required by the Initiative Tierwohl to participate in a certified quality assurance program (QS or another recognized quality assurance system). Product identity and correct labelling are verified by independent auditors during an annual audit, based on the Meat Industry Requirements Catalogue.',
                    'items' => [
                        'Slaughtering',
                        'Deboning / cutting',
                        'Processing',
                        'Meat wholesale',
                        'Convenience',
                        'Storage of meat and meat products',
                        'Butchery',
                        'Broker',
                    ],
                ],
                [
                    'title' => 'Pet food',
                    'text' => 'In addition to meat and meat products, pet food can also be labelled with the Initiative Tierwohl seal. An audit is carried out each year of participation to verify compliance with the ITW requirements, which are based on the proven standard of the FEDIAF European Petfood Code.',
                    'items' => [
                        'Transport (raw material pet food)',
                        'Storage (raw material pet food)',
                        'Processing plant (raw materials pet food)',
                        'Pet-food plant',
                        'Wholesale (pet food)',
                        'Private labelling (pet food)',
                        'Broker (pet food)',
                    ],
                ],
            ],
        ],
    ];
}

function ifta_further_standards()
{
    return [
        'VLOG — Standard “Ohne Gentechnik” (without GMO)',
        'German origin label “Herkunftszeichen Deutschland”',
        'EMAS III, Eco-Management, Regulation (EC) No 1221/2009',
        'REDcert / REDcert²',
        'SURE EU',
    ];
}

function ifta_get_standard($slug)
{
    $all = ifta_standards();
    return $all[$slug] ?? null;
}

function ifta_standard_url($baseUrl, $slug)
{
    $standard = ifta_get_standard($slug);
    if (!$standard) {
        return $baseUrl . '/system-certification.php';
    }
    return $baseUrl . '/' . $standard['file'];
}
