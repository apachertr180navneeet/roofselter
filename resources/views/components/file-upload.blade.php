@props([
    'name' => 'image',
    'label' => 'Upload File',
    'current' => null,
])

@php
    // Agar file ka naam hai to sirf basename.ext nikalna
    $fileName = $current ? pathinfo($current, PATHINFO_BASENAME) : '';
@endphp

<div class="file-upload">
    <input type="file" name="{{ $name }}" class="file-input form-control" accept="image/*">

    <div class="file-preview @if(!$current) d-none @endif">
        <img src="{{ $current ? asset('img/'.$current) : '' }}" class="preview-img" alt="Preview">
        <div class="file-info">
            <span class="file-name">{{ $fileName }}</span>
            <span class="file-size">{{ $current ? 'Existing' : '' }}</span>
        </div>
        <button type="button" class="remove-btn">&times;</button>
    </div>

    <input type="hidden" name="remove_{{ $name }}" class="remove-flag" value="0">
</div>

