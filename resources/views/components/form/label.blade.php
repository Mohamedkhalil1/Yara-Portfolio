@props([
    'title'       => '',
    'required'    => true
])

<label {{ $attributes }}>
    {{ $title }}
    @if($required)
        <span class="text-danger">*</span>
    @endif
</label>
