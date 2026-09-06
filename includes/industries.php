<?php

function wf_industry_url($slug, $baseUrl = '')
{
    return rtrim((string) $baseUrl, '/') . '/industries/' . rawurlencode($slug) . '/';
}

function wf_industries_listing_url($baseUrl = '')
{
    return rtrim((string) $baseUrl, '/') . '/references.php';
}

function wf_request_industry_slug()
{
    $path = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
    if (is_string($path) && preg_match('#/industries/([a-z0-9-]+)/?$#', $path, $matches)) {
        return strtolower($matches[1]);
    }
    if (!empty($_GET['slug']) && is_string($path) && preg_match('#industry\.php$#', $path)) {
        return strtolower(trim((string) $_GET['slug']));
    }
    return '';
}

function wf_industry_why()
{
    return [
        'Over 80 years of dedicated custom forging experience.',
        'Fast quotes and quick turnaround times to meet emergency schedules.',
        'The capability to flexibly handle all sizes of projects, no matter how large or complex.',
        'A proven track record of reliability, compliance, safety, and customer service.',
    ];
}

function wf_industries()
{
    $why = wf_industry_why();

    return [
        'chemical-petrochemical' => [
            'slug' => 'chemical-petrochemical',
            'nav' => 'Chemical & Petrochemical',
            'card' => 'Chemical & Petrochemical',
            'card_text' => 'Quick-turnaround, durable, essential parts for acidic, corrosive, and abrasive applications, in over 80 alloys.',
            'page_title' => 'Chemical and Petrochemical Forgings | Deutsche Fittings GmbH',
            'hero_title' => 'Forged Solutions for the Chemical and Petrochemical Industry',
            'hero_subtitle' => 'High-performance flanges and custom forgings for chemical and petrochemical operations.',
            'about_title' => 'About the Chemical and Petrochemical Market',
            'about' => 'Across the petrochemical and general chemical industries, numerous prevailing processes and methods are in use. These often involve acidic, corrosive, and abrasive conditions, putting strain on forged components used in chemical plants. With over 80 alloys in stock, Deutsche Fittings GmbH can provide the necessary parts, responding quickly in emergency circumstances to deliver on demanding lead times.',
            'experience' => 'Deutsche Fittings GmbH has spent over 80 years offering custom forged products with the quality, precision, and dependability companies need. Petrochemical and chemical organizations are among our key markets, and our lineup of U.S.-made premium and exotic metals enables us to deliver parts that can withstand the harsh chemical production environments.',
            'quality' => 'Deutsche Fittings GmbH has a quality management system that sets the standard for the entire forge and flange industry, with a dedicated quality director, metallurgist, quality assurance technicians, quality control inspectors, non-destructive testing inspectors, and final inspectors on staff. We are certified to ISO 9001:2015 and comply with PED, PER, NRC, DFARS, ITAR, CFSI, and other essential standards.',
            'why_intro' => 'Deutsche Fittings GmbH is the ideal partner for your chemical or petrochemical forging project because we offer:',
            'why' => $why,
            'related' => 'To determine why Deutsche Fittings GmbH is the best choice to provide flanges or other forged products for your petrochemical or chemical project, you can review our full list of products, our custom forging capabilities, and our certifications.',
            'cta' => 'If you’re ready to get started on your next project, request a quote today or speak directly to the Deutsche Fittings GmbH team — we’re eager to hear from you.',
        ],
        'lng' => [
            'slug' => 'lng',
            'nav' => 'LNG',
            'card' => 'Liquefied Natural Gas',
            'card_text' => 'Forged components for the production, transport, and storage of liquefied natural gas. Our forgings withstand the most demanding pressures and temperatures of LNG applications.',
            'page_title' => 'LNG Forgings | Deutsche Fittings GmbH',
            'hero_title' => 'Forged Solutions for the Liquefied Natural Gas Industry',
            'hero_subtitle' => 'High-quality flanges and custom forgings for the LNG space.',
            'about_title' => 'About the LNG Market',
            'about' => 'Components for LNG production and transportation applications must meet stringent standards of durability. Cryogenic-grade alloys are crucial for complying with regulations and ensuring safe, reliable operations. Deutsche Fittings GmbH’s long list of premium and exotic alloys can rise to the challenge and deliver the performance your business needs.',
            'experience' => 'With over 80 years of experience, Deutsche Fittings GmbH has taken on projects in the most sophisticated and demanding industries. Our expertise with advanced alloys ensures that you receive the components you need, while our extensive inventory enables us to deliver orders with expedited lead times, minimizing downtime for your critical components.',
            'quality' => 'By building a robust internal quality management system, we’ve positioned Deutsche Fittings GmbH as a leader in the production of key forged components for companies in demanding, specialized industries, including the liquefied natural gas space. We are certified to ISO 9001:2015 and comply with numerous industry standards, including PED, PER, NRC, DFARS, ITAR, and CFSI.',
            'why_intro' => 'Deutsche Fittings GmbH is the ideal partner for even the most demanding LNG applications. We offer:',
            'why' => $why,
            'related' => 'When you view the full breadth of Deutsche Fittings’ flange offerings, custom forging capabilities, and certifications, you can see our commitment to quality and service in the LNG space and across industries.',
            'cta' => 'If you’re ready to take the next steps in ordering forged components for your LNG project, you can request a quote immediately or speak directly to our helpful team.',
        ],
        'oil-gas' => [
            'slug' => 'oil-gas',
            'nav' => 'Oil & Gas',
            'card' => 'Oil and Gas',
            'card_text' => 'Flanges and special request products for onshore, offshore, subsea, midstream, and downstream projects. We’re committed to helping resolve time-sensitive requests to minimize downtime.',
            'page_title' => 'Oil and Gas Forgings | Deutsche Fittings GmbH',
            'hero_title' => 'Forged Solutions for the Oil and Gas Industry',
            'hero_subtitle' => 'Reliable flanges and custom forgings for all aspects of the oil and gas industry.',
            'about_title' => 'About the Oil and Gas Market',
            'about' => 'With an absolute need for safety and compliance with regulations from the EPA, OSHA, and more, every forged component you order for your oil or gas facility must adhere to high standards of quality. Whether your project involves an onshore, offshore, midstream, or downstream facility, you require precision-forged parts, and you need them quickly to avoid costly downtime.',
            'experience' => 'In our 80+ years of producing high-quality flanges and custom forged components, Deutsche Fittings GmbH has helped numerous oil and gas projects continue to operate smoothly. Our reliable forgings, produced in over 80 premium and exotic alloys, meet the most demanding standards. Our extensive material inventory allows us to produce these components on tight timelines.',
            'quality' => 'Our quality team, consisting of a quality director, a metallurgist, quality assurance technicians, quality control inspectors, non-destructive testing inspectors, and final inspectors, sets the standard within the forging space. This commitment to quality assurance comes with a long list of certifications. We are certified to ISO 9001:2015 and comply with PED, PER, NRC, DFARS, ITAR, CFSI, and other key standards.',
            'why_intro' => 'Deutsche Fittings GmbH is the ideal partner for even the most demanding oil and gas applications, onshore or offshore, upstream or downstream. We offer:',
            'why' => $why,
            'related' => 'Deutsche Fittings GmbH has built a reputation as a reliable forging partner since our founding in 1944. By viewing our full list of products, our custom forging capabilities, and our certifications, you can verify we’re the right partner for your oil and gas project.',
            'cta' => 'If you’re ready to order the parts you need and receive them on a tight timeline, request a quote today or contact our team directly.',
        ],
        'renewable-fuels' => [
            'slug' => 'renewable-fuels',
            'nav' => 'Renewable Fuels',
            'card' => 'Renewable Fuels',
            'card_text' => 'On-demand forgings for hydrogen and other emerging fuels. We offer a full range of components that meet stringent industry standards, ensuring the safety and efficiency of your green energy infrastructure.',
            'page_title' => 'Renewable Forgings | Deutsche Fittings GmbH',
            'hero_title' => 'Forged Solutions for the Renewable Fuel Space',
            'hero_subtitle' => 'Reliable components for use with biodiesel, ethanol, and other emerging fuels.',
            'about_title' => 'About the Renewable Fuels Market',
            'about' => 'Engaging in the production, processing, or transportation of biodiesel, ethanol, and other renewable fuels requires reliable components that will keep your operations running safely around the clock, without interruption. Your facilities must comply with EPA, OSHA, and other relevant regulations while maintaining a strong level of uptime. Deutsche Fittings GmbH can provide the flanges and custom-forged parts your applications need.',
            'experience' => 'Deutsche Fittings GmbH has spent over 80 years producing forgings for demanding industries, leveraging our extensive inventory of over 80 premium and exotic alloys. By having these materials available, we can deliver components for your renewable fuel plant on demanding schedules, thereby preventing extended downtime.',
            'quality' => 'Deutsche Fittings GmbH has established an internal quality control team that sets the standard within the flange and forging industry. Our group of technicians and inspectors ensures that every part we produce is up to demanding standards. We are certified to ISO 9001:2015 and comply with PED, PER, NRC, DFARS, ITAR, CFSI, and other key standards, making us the perfect choice for your renewable fuel project.',
            'why_intro' => 'Deutsche Fittings GmbH is the ideal partner for projects in biodiesel, ethanol, and other renewables. We offer:',
            'why' => $why,
            'related' => 'To verify that Deutsche Fittings GmbH is the right provider of parts for your renewable fuel manufacturing or transportation application, you can view our full list of available products, along with our custom forging capabilities and long list of certifications and compliance with standards.',
            'cta' => 'To get started on your next forging project, simply request a quote, and our team will respond promptly. Alternatively, you can reach out directly and discuss your project’s special requirements.',
        ],
        'nuclear' => [
            'slug' => 'nuclear',
            'nav' => 'Nuclear',
            'card' => 'Nuclear',
            'card_text' => 'Deutsche Fittings specializes in flanges for the Nuclear industry, forging metals to exact specifications even on tight deadlines. All components are produced under our ISO 9001:2015 certified Nuclear Quality Program.',
            'page_title' => 'Nuclear Forgings | Deutsche Fittings GmbH',
            'hero_title' => 'Forged Solutions for Nuclear Plants',
            'hero_subtitle' => 'Compliant and safe forged components for demanding nuclear power applications.',
            'about_title' => 'About the Nuclear Power Market',
            'about' => 'As one of the most heavily regulated and safety-conscious industries in the world, nuclear power generation comes with intensive requirements for every part and component. When purchasing custom-forged flanges and other products, you must meet industry specifications while still managing tight turnaround times to avoid downtime — you need to work with a specialist, like Deutsche Fittings GmbH.',
            'experience' => 'Deutsche Fittings GmbH is dedicated to meeting the needs of the nuclear industry. We are certified to ISO 9001:2015 and operate an internal Nuclear Quality Program to ensure that our premium and exotic alloy forgings meet the required standards. Our program is compliant with NQA-1, 10CFR50 Appendix B, 10CFR Part 21, and ASME NCA-3800 standards. Our extensive materials inventory enables us to execute projects on expedited timelines.',
            'quality' => 'In addition to our Nuclear Quality Program and adherence to NQA-1, 10CFR50 Appendix B, 10CFR Part 21, and ASME NCA-3800 standards, Deutsche Fittings GmbH maintains a comprehensive list of other certifications. We are certified to ISO 9001:2015 and comply with PED, PER, NRC, DFARS, ITAR, CFSI, and other key standards, providing the oversight needed to ensure your nuclear plant is equipped with the highest-quality components.',
            'why_intro' => 'Deutsche Fittings GmbH is a specialist in the nuclear industry and an established name in the broader world of flange production and custom forging. We offer:',
            'why' => $why,
            'related' => 'In heavily regulated and demanding industries, selecting trustworthy partner organizations is one of the most important moves you can make. Deutsche Fittings GmbH can become a valuable partner for your plant. View our full list of products, our custom forging capabilities, and our long list of certifications to see what we can offer.',
            'cta' => 'If you’re ready to move ahead with ordering new nuclear power generation components, you can request an immediate quote or contact our team directly.',
        ],
        'power-generation' => [
            'slug' => 'power-generation',
            'nav' => 'Power Generation',
            'card' => 'Power Generation',
            'card_text' => 'Flanges and fittings for the safe and efficient operation of power plants. Our forgings withstand the extreme conditions of power gen applications, including high-temp, high-pressure, and corrosive environments.',
            'page_title' => 'Power Generation Forgings | Deutsche Fittings GmbH',
            'hero_title' => 'Forged Solutions for Power Generation',
            'hero_subtitle' => 'Forged components that can stand up to power generation requirements.',
            'about_title' => 'About the Power Generation Market',
            'about' => 'Whether a plant uses fossil fuels like coal or alternatives like wind turbines or solar panels, power generation is one of the most demanding sectors for forged components. High-temperature, high-pressure operations are the norm, and it’s essential to avoid costly and wasteful downtimes. Specialized requirements are especially strong when dealing with nuclear power.',
            'experience' => 'Deutsche Fittings GmbH has served as a partner for specialized businesses, including power plants, for over 80 years. Our experienced team and internal quality control group can deliver high-performance flanges and custom forged components. Our inventory of over 80 premium and exotic materials enables us to offer quick turnaround times. Our extensive list of certifications includes compliance with nuclear standards, enabling us to support even the most demanding power generation scenarios.',
            'quality' => 'We operate an industry-leading internal quality team consisting of a quality director, a metallurgist, quality assurance technicians, quality control inspectors, non-destructive testing inspectors, and final inspectors. These personnel ensure our forgings meet power generation standards. Our operations are certified to ISO 9001:2015, and our Nuclear Quality Program adheres to NQA-1, 10CFR50 Appendix B, 10CFR Part 21, and ASME NCA-3800 standards.',
            'why_intro' => 'Deutsche Fittings GmbH is an advanced forging specialist capable of delivering compliant, high-quality parts for your power generation business on emergency timelines. We offer:',
            'why' => $why,
            'related' => 'Deutsche Fittings GmbH has been in business since 1944, offering a premium experience to our demanding clients. View our full list of products, our custom forging capabilities, and our certifications to see what we can offer your project.',
            'cta' => 'Ready to get started with your next order of flanges or custom forged parts for your power generation facility? Request a quote now or contact us directly.',
        ],
        'pulp-paper' => [
            'slug' => 'pulp-paper',
            'nav' => 'Pulp & Paper',
            'card' => 'Pulp and Paper',
            'card_text' => 'Newer manufacturing methods can result in high corrosion susceptibility. Our use of forged high-performance alloys protects against corrosive substances, extending the life of pulp and paper machinery.',
            'page_title' => 'Pulp and Paper Forgings | Deutsche Fittings GmbH',
            'hero_title' => 'Forged Solutions for the Pulp and Paper Industry',
            'hero_subtitle' => 'High-quality forged components to withstand modern paper manufacturing processes.',
            'about_title' => 'About the Pulp and Paper Market',
            'about' => 'The pulp and paper space has evolved in the past few years with the introduction of new manufacturing methods. Chemical washdowns and other abrasive processes have led to increased corrosion susceptibility, thereby accelerating the rate of equipment turnover. To counteract this effect, your organization can turn to parts made from forged high-performance alloys.',
            'experience' => 'Since 1944, Deutsche Fittings GmbH has provided high-quality forged flanges and custom forged components for demanding applications across industries. With over 80 premium and exotic alloys in inventory, we’re capable of delivering key parts on expedited timelines. This commitment to speed enables your paper manufacturing facility to minimize costly downtime.',
            'quality' => 'Deutsche Fittings GmbH’s commitment to quality extends to our internal quality control team, which consists of a quality director, a metallurgist, quality assurance technicians, quality control inspectors, non-destructive testing inspectors, and final inspectors. Our operations are certified to ISO 9001:2015 and comply with PED, PER, NRC, DFARS, ITAR, CFSI, and other key standards.',
            'why_intro' => 'Deutsche Fittings GmbH is up to the challenge of providing durable, high-performance forged components for use in pulp and paper manufacturing. This is because we bring:',
            'why' => $why,
            'related' => 'By viewing the full breadth of Deutsche Fittings GmbH’s offerings, checking our custom forging process, and verifying our certifications, you can confirm that we’re the right partner for your industrial paper manufacturing needs.',
            'cta' => 'If you’re ready for your next order of forged components, whether as part of a long-term project or to minimize downtime following a mechanical failure, request a quote now or contact our team.',
        ],
        'marine-shipbuilding' => [
            'slug' => 'marine-shipbuilding',
            'nav' => 'Marine & Shipbuilding',
            'card' => 'Marine and Shipbuilding',
            'card_text' => 'We supply the marine and shipbuilding industry with rugged, reliable flanges and custom forgings built to perform in the harsh, corrosive environments of marine vessels and offshore platforms.',
            'page_title' => 'Marine and Shipbuilding Forging | Deutsche Fittings GmbH',
            'hero_title' => 'Forged Solutions for the Marine and Shipbuilding Industry',
            'hero_subtitle' => 'High-quality forged components that meet marine and shipbuilding standards.',
            'about_title' => 'About the Marine and Shipbuilding Market',
            'about' => 'Shipbuilding and offshore applications require stringent standards for every part and component. Whether you’re working in naval engineering — with the added requirements of defense-approved components — or commercial shipbuilding, you need to ensure you have a reliable forging partner.',
            'experience' => 'Deutsche Fittings GmbH’s over-80-year history begins in nautical applications. We made our name in California, forging components used by the Pacific fleet in World War II. Now based in Texas, we produce flanges and custom forgings used in advanced shipbuilding scenarios, including the production of nuclear submarines for the Navy. We can deliver the parts you need on quick emergency timelines thanks to our inventory of more than 80 premium and exotic materials.',
            'quality' => 'Deutsche Fittings GmbH’s commitment to quality includes our decision to employ a large in-house quality team, as well as our attainment of numerous certifications. We are certified to ISO 9001:2015 and comply with numerous industry standards, including PED, PER, NRC, DFARS, ITAR, and CFSI. Carrying defense and nuclear approvals enables us to provide parts for these demanding and heavily regulated spaces.',
            'why_intro' => 'Deutsche Fittings GmbH is the ideal supplier for flanges and custom forged components for your next shipbuilding, offshore construction, or naval project. This is because we bring:',
            'why' => $why,
            'related' => 'By viewing the full breadth of Deutsche Fittings’ products and capabilities, you can determine how we fit into your organization’s plans for its next shipbuilding or offshore project. Our list of certifications shows our commitment to quality and ability to meet exacting standards.',
            'cta' => 'If you’re ready to take action on your next major nautical project, request a quote today or contact our team directly to discuss specifics.',
        ],
        'pharmaceuticals' => [
            'slug' => 'pharmaceuticals',
            'nav' => 'Pharmaceuticals',
            'card' => 'Pharmaceuticals',
            'card_text' => 'We produce high-purity, corrosion-resistant forgings made from premium materials essential for sterile processing and fluid management.',
            'page_title' => 'Pharmaceutical Forgings | Deutsche Fittings GmbH',
            'hero_title' => 'Forged Solutions for Pharmaceutical Providers',
            'hero_subtitle' => 'Precision forged flanges and custom components for pharmaceutical manufacturers.',
            'about_title' => 'About the Pharmaceutical Manufacturing Market',
            'about' => 'As a pharmaceutical manufacturer, you face key challenges and demands. You must maintain a safe and compliant production process, even as new methods continue to revolutionize the space. At the same time, you must maintain high efficiency and avoid downtime to stay at the forefront of the industry. There is a corresponding need for reliable components, including precision-forged flanges.',
            'experience' => 'Deutsche Fittings GmbH has spent over 80 years as a leading provider of flanges and custom forged components. We hold an inventory of over 80 premium and exotic materials, which enables us to fulfill orders on expedited timelines. This is good news for your pharmaceutical manufacturing business, as you can secure reliable replacement components quickly and prevent downtime from harming your productivity.',
            'quality' => 'Deutsche Fittings GmbH takes quality and regulatory compliance seriously, ensuring that all components we produce for your pharmaceutical manufacturing operations meet the highest standards. We operate an in-house quality department and are certified to ISO 9001:2015. We comply with PED, PER, NRC, DFARS, ITAR, CFSI, and numerous other industry standards, further demonstrating our dedication to quality and precision.',
            'why_intro' => 'Deutsche Fittings GmbH is a trusted partner for producing custom forgings and flanges for use in pharmaceutical manufacturing. We provide:',
            'why' => $why,
            'related' => 'To determine the extent to which Deutsche Fittings GmbH can assist with your pharmaceutical manufacturing operations, you can review our full list of products, our custom forging offerings, and our certifications from industry bodies.',
            'cta' => 'There’s no need to delay — if it’s time to order the necessary parts for pharmaceutical manufacturing, you can request a quote now or contact our team directly.',
        ],
        'agriculture' => [
            'slug' => 'agriculture',
            'nav' => 'Agriculture',
            'card' => 'Agriculture',
            'card_text' => 'Forged parts prolong the life cycle of agricultural equipment. Reliable nickel-alloy and corrosion-resistant flanges are used for ethanol and biofuel production, filtration systems, agrochemical applications, and agricultural biotechnology.',
            'page_title' => 'Agricultural Forging | Deutsche Fittings GmbH',
            'hero_title' => 'Forged Solutions for Agriculture',
            'hero_subtitle' => 'Forged components to prolong the life cycle of advanced agricultural equipment.',
            'about_title' => 'About the Agriculture Market',
            'about' => 'Industrial agriculture equipment, filtration systems, and biodiesel production infrastructure are subject to wear and tear. Prolonging the life cycle of these assets can bolster the bottom line of businesses in the agrochemical, agricultural, biotechnical, and biodiesel and ethanol spaces. To achieve this improved usable life, it pays to use forged parts manufactured from advanced, corrosion-resistant materials and nickel alloys.',
            'experience' => 'Deutsche Fittings GmbH has spent over 80 years producing advanced forgings and custom parts from a long list of high-performance, premium, and exotic alloys. By maintaining an inventory of 80+ materials, we enable quick turnaround times on emergency orders. This responsiveness will allow you to prevent extended downtime and keep your mission-critical agricultural equipment operating consistently.',
            'quality' => 'Quality is a consistent theme for Deutsche Fittings GmbH and has been since our founding. Our internal quality team consists of a quality director, a metallurgist, quality assurance technicians, quality control inspectors, non-destructive testing inspectors, and final inspectors, all dedicated to ensuring our output meets exacting standards. We are certified to ISO 9001:2015. We comply with PED, PER, NRC, DFARS, ITAR, CFSI, as well as numerous other industry standards.',
            'why_intro' => 'Deutsche Fittings GmbH is up to the challenge of producing high-quality parts to extend the usable life span of agricultural equipment. We offer:',
            'why' => $why,
            'related' => 'You can review Deutsche Fittings GmbH’s full list of products, along with our custom forging capabilities and our list of industry certifications, to verify that we are the ideal partner to provide reliable components for your organization’s heavy industrial equipment.',
            'cta' => 'When it’s time to place an order for components, whether on a quick-turnaround emergency basis or as part of a large-scale contract, request a quote or contact us directly.',
        ],
        'mining' => [
            'slug' => 'mining',
            'nav' => 'Mining',
            'card' => 'Mining',
            'card_text' => 'We provide the mining industry with flanges and forgings for especially abrasive environments. From zinc and rare earth mines to iron and uranium, Western provides the edge needed to keep equipment running.',
            'page_title' => 'Mining Forging | Deutsche Fittings GmbH',
            'hero_title' => 'Forged Solutions for Mining',
            'hero_subtitle' => 'Reliable and durable forged parts for use in abrasive mining environments.',
            'about_title' => 'About the Mining Market',
            'about' => 'Operating reliable machinery in mining is absolutely mission-critical — breakdowns and unexpected downtime can lead to massive lost revenue. In such an abrasive environment, however, it’s essential to find equipment components that can withstand consistent wear and tear. This requirement applies to mines of zinc, rare earth, iron, uranium, and other types of minerals.',
            'experience' => 'Deutsche Fittings GmbH brings over eight decades of metallurgical and forging experience to every forging assignment. Our extensive list of available premium and exotic alloys allows us to select the perfect material for every job, and our large inventory means we can produce parts on emergency time scales to prevent excessive downtime. These traits make us an ideal partner to assist with components for mining equipment.',
            'quality' => 'Deutsche Fittings GmbH is certified to ISO 9001:2015. We also comply with PED, PER, NRC, DFARS, ITAR, CFSI, as well as numerous other industry standards, including nuclear and military specifications. Our commitment to quality is supported by a well-staffed internal quality control department, which is responsible for overseeing our output. This ensures the components for your mining equipment will meet and exceed standards and expectations.',
            'why_intro' => 'Deutsche Fittings GmbH can deliver high-performance forged components for use in demanding, abrasive mining environments. We offer:',
            'why' => $why,
            'related' => 'To verify that Deutsche Fittings GmbH is the ideal partner for your mining component needs, you can review our full list of products, our custom forging capabilities, and our industry certifications.',
            'cta' => 'If it’s time for your next order of reliable components to extend the usable life span of your mining equipment, you can request a quote or contact our team directly.',
        ],
        'defense' => [
            'slug' => 'defense',
            'nav' => 'Defense',
            'card' => 'Defense',
            'card_text' => 'We’re a trusted partner to the defense industry, providing forged components that support our troops and safeguard our nation. We collaborate with leading defense partners to accelerate the manufacturing of next-generation technology.',
            'page_title' => 'Defense and Military Forging | Deutsche Fittings GmbH',
            'hero_title' => 'Forged Solutions for Defense',
            'hero_subtitle' => 'Custom flanges and other forgings that meet military specifications, for use in defense applications.',
            'about_title' => 'About the Defense Market',
            'about' => 'Manufacturing equipment for the military and defense space means adhering to highly specific requirements and complying with applicable laws. Standards and specifications are always evolving as the sector becomes more technologically advanced and innovative. From materials to designs, every element of defense projects must be carefully chosen by experts.',
            'experience' => 'Deutsche Fittings GmbH has been meeting the unique demands of military applications for over eight decades, as we were founded to produce components for the Pacific fleet during World War II. For all this time, we’ve been proud to produce the components that support our troops and safeguard our nation. We’ve completed numerous complex projects for the U.S. military and private sector, including the production of nuclear submarine components for the Navy.',
            'quality' => 'Deutsche Fittings GmbH holds the certifications required to execute defense work. In addition to various civilian standards, we comply with the MIL-I-45208A military standard and the 10CFR50 APP-B federal nuclear regulation. We are certified to ISO 9001:2015 and maintain an internal quality control and non-destructive testing team to ensure that every project is produced to the highest possible standards.',
            'why_intro' => 'Deutsche Fittings GmbH is a trusted partner that can collaborate on components for the highest-profile military and defense projects. We offer:',
            'why' => $why,
            'related' => 'By viewing the full breadth of Deutsche Fittings GmbH’s product offerings, custom forging capabilities, and certifications — military and civilian — you can see the depth of our experience. These are the qualities that make us ideal partners for defense work.',
            'cta' => 'To move forward with your project, simply request a quote today, or contact our team directly to discuss the details.',
        ],
    ];
}

function wf_get_industry($slug)
{
    $industries = wf_industries();
    return $industries[$slug] ?? null;
}
