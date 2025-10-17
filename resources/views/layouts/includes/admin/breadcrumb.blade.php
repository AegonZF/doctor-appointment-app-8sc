{{-- Verify if there's an element that belongs to breadcrumb --}}
@if(count($breadcrumbs))
    {{-- Margin bottom --}}
    <nav class="mb-2 block">
        <ol class="flex flex-wrap text-slate-700 text-sm">
            {{-- Recorrer element of breadcrumb --}}
            @foreach ($breadcrumbs as $item)
            <li class="flex items-center">
                {{-- si NO es el primer elemento, ponkke separador antes --}}
                @unless ($loop->first)
                    <span class="px-2 text-gray-400">/</span>
                @endunless
                {{-- Check if it has an href --}}
                @isset($item['href'])
                <a href="{{ $item['href'] }}" class="opacity-60 hover:opacity-100 transition">
                    {{ $item['name'] }}
                </a>
                    
                @else
                     {{ $item['name'] }}
                @endisset


            </li>
            @endforeach
        </ol>
        {{-- The last element in bold --}}
        @if (count($breadcrumbs)>1)
        <h6 class="font-bold mt-2">
            {{ end($breadcrumbs)['name'] }}
        </h6>
        @endif
    </nav>
@endif