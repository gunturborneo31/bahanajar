@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="content-wrapper bg-white rounded-lg shadow-sm p-4 mx-auto" style="max-width:900px;">
        <h1 class="mb-4 text-2xl font-bold text-[#111827]">{{ $article->title ?? 'Peraturan' }}</h1>
        {{-- Breadcrumbs dari content --}}
        @php
            $content = $article->content ?? '';
            $breadcrumbHtml = '';
            // Ambil <ol ...> yang mengandung li[title]
            if (preg_match('/<ol[^>]*>(.*?)<\/ol>/is', $content, $olMatch)) {
                $ol = $olMatch[1];
                preg_match_all('/<li[^>]*title=["\']?([^"\'>]+)["\']?[^>]*>(.*?)<\/li>/is', $ol, $liMatches, PREG_SET_ORDER);
                if (count($liMatches)) {
                    $breadcrumbHtml .= '<nav aria-label="breadcrumb" class="mb-4">';
                    $breadcrumbHtml .= '<ol class="custom-breadcrumb flex flex-wrap items-center bg-white px-3 py-2 rounded-lg shadow-sm">';
                    foreach ($liMatches as $i => $m) {
                        $isLast = ($i === count($liMatches) - 1);
                        if (preg_match('/<a[^>]*href=["\']?([^"\'>]+)["\']?[^>]*>(.*?)<\/a>/is', $m[2], $aMatch)) {
                            $label = trim($aMatch[2]) ?: trim($m[1]);
                            $url = $aMatch[1];
                        } else {
                            $label = trim(strip_tags($m[2])) ?: trim($m[1]);
                            $url = null;
                        }
                        if ($i > 0) {
                            $breadcrumbHtml .= '<span class="mx-2 text-[#9CA3AF]">&rsaquo;</span>';
                        }
                        if ($isLast) {
                            $breadcrumbHtml .= '<li class="breadcrumb-item active text-[#DC2626] font-semibold" aria-current="page">'.e($label).'</li>';
                        } else {
                            if ($url) {
                                $breadcrumbHtml .= '<li class="breadcrumb-item"><a href="'.e($url).'" class="text-[#374151] hover:text-[#DC2626] font-medium">'.e($label).'</a></li>';
                            } else {
                                $breadcrumbHtml .= '<li class="breadcrumb-item">'.e($label).'</li>';
                            }
                        }
                    }
                    $breadcrumbHtml .= '</ol></nav>';
                }
                $content = preg_replace('/<ol[^>]*>.*?<\/ol>/is', '', $content, 1);
            }
            // Deteksi dan ganti tampilan file/lampiran
            $content = preg_replace_callback('/<a[^>]*href=["\']?([^"\'>]+\.(pdf|docx?|xlsx?|pptx?|zip|rar|jpg|jpeg|png|gif))["\']?[^>]*>(.*?)<\/a>/is', function($m) {
                $icon = '<svg class="inline w-5 h-5 mr-1 text-[#DC2626]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 002.828 2.828l6.586-6.586a2 2 0 00-2.828-2.828z"/></svg>';
                $ext = strtolower($m[2]);
                $label = trim(strip_tags($m[3])) ?: $m[1];
                $fileLabel = '<span class="inline-block px-2 py-1 bg-[#F3F4F6] rounded text-xs font-semibold text-[#374151] mr-2">'.strtoupper($ext).'</span>';
                return '<a href="'.e($m[1]).'" target="_blank" class="file-attachment-link flex items-center gap-2 text-[#2563eb] hover:underline">'.$icon.$fileLabel.e($label).'</a>';
            }, $content);
            // Hapus semua <img> dengan src tertentu
            $content = preg_replace('/<img[^>]*src=["\']https:\/\/bantuan\.inaproc\.id\/hc\/theming_assets\/01HZH6CQ4EGFSSGZJYEAVBK3SB["\'][^>]*>/i', '', $content);
        @endphp
        {!! $breadcrumbHtml !!}
        <div class="markdown prose prose-sm lg:prose-lg max-w-none">
            {!! $content ?: '<em>Konten tidak ditemukan.</em>' !!}
        </div>
        @push('styles')
        <style>
        .custom-breadcrumb {
            list-style: none;
            padding: 0;
            margin: 0;
            background: none;
        }
        .custom-breadcrumb li {
            display: inline;
            font-size: 15px;
        }
        .custom-breadcrumb .active {
            color: #DC2626;
            font-weight: bold;
        }
        .file-attachment-link {
            display: inline-flex;
            align-items: center;
            margin: 4px 0;
            padding: 4px 8px;
            background: #F9FAFB;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03);
            transition: background 0.2s;
        }
        .file-attachment-link:hover {
            background: #F3F4F6;
            text-decoration: underline;
        }
        </style>
        @endpush
        <a href="{{ route('peraturan') }}" class="btn btn-secondary mt-4 rounded-lg">&larr; Kembali ke daftar peraturan</a>
    </div>
</div>
@endsection
