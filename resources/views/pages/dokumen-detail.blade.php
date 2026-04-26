@extends('layouts.app')
@section('title', 'Detail Dokumen Pengadaan - BahanAjar')

@section('content')
@include('pages.materi-detail', ['isDokumen' => true])
@endsection
