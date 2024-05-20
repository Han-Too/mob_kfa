@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-danger-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            {{-- <li>{{ $message }}</li> --}}
            <label class="form-label fs-6 text-danger">{{$message}}</label>
        @endforeach
    </ul>
@endif
