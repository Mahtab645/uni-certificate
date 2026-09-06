<?php

function ifta_certificates()
{
    return [
        'IFTA-9001-2024' => [
            'number' => 'IFTA-9001-2024',
            'title' => 'Quality Management DIN EN ISO 9001',
            'file' => 'certificates/certification-process.pdf',
        ],
        'IFTA-14001-2024' => [
            'number' => 'IFTA-14001-2024',
            'title' => 'Environmental Management DIN EN ISO 14001',
            'file' => 'certificates/certificate-mark-regulations.pdf',
        ],
        'IFTA-50001-2024' => [
            'number' => 'IFTA-50001-2024',
            'title' => 'Energy Management DIN EN ISO 50001',
            'file' => 'certificates/certification-process.pdf',
        ],
        'IFTA-22000-2024' => [
            'number' => 'IFTA-22000-2024',
            'title' => 'Food Safety DIN EN ISO 22000 / FSSC 22000',
            'file' => 'certificates/certificate-mark-regulations.pdf',
        ],
        'DEMO-2026' => [
            'number' => 'DEMO-2026',
            'title' => 'Sample IFTA certificate',
            'file' => 'certificates/certification-process.pdf',
        ],
    ];
}

function ifta_normalize_certificate_number($value)
{
    $value = strtoupper(trim((string) $value));
    $value = preg_replace('/\s+/', '', $value);
    return $value;
}

function ifta_find_certificate($number)
{
    $key = ifta_normalize_certificate_number($number);
    if ($key === '') {
        return null;
    }

    $all = ifta_certificates();
    return $all[$key] ?? null;
}
