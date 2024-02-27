@extends('layouts.app')
@section('content')
    @foreach ($lists as $List)
        <div class="pdf-container">
            <!-- Display PDF details -->
            <div class="pdf-details">
                <img class="pdfimage" src="{{ asset('assets/images/pdf.png') }}" alt="PDF Icon" width="60px">
                <p>{{ $List->title }}</p>
            </div>

            <!-- Add Download and View buttons -->
            <div class="pdf-buttons">
                <a href="{{ asset('uploads/pdf/' . $List->title) }}" download="{{ asset('uploads/pdf/' . $List->title) }}"
                    class="btn">Download
                </a>
                <a href="{{ asset('uploads/pdf/' . $List->file) }}" class="btn">
                    View
                </a>

            </div>
        </div>
    @endforeach
@endsection
