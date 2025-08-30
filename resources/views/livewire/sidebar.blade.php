

<!-- Lista dokumenata iz baze -->

@foreach ($documents as $doc)
    <li>
        <a href="{{ asset('storage/documents/' . $doc->path) }}" target="_blank"
           class="flex items-center gap-5 hover:bg-gray-100 p-2 rounded-lg transition-all duration-150">

            <span class="border border-gray-600 rounded-lg p-px">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.9" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </span>

            <h4 x-cloak x-show="!(shrink || drawer)" class="text-lg font-medium">
                {{ $doc->title ?? 'Dokument #' . $doc->id }}
            </h4>

        </a>
    </li>
@endforeach

