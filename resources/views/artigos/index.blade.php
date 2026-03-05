<x-layouts::auth.simple>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Artigos Publicados</h1>
        <ul class="space-y-4">
            @foreach ($artigos as $artigo)
                <li class="border-b pb-4">
                    <a href="{{ route('artigos.show', $artigo->id) }}" class="text-lg font-semibold text-blue-600 hover:underline">
                        {{ $artigo->titulo }}
                    </a>
                    <div class="text-gray-500 text-sm">Publicado em {{ $artigo->created_at->format('d/m/Y') }}</div>
                    <p class="mt-2 text-gray-700">{{ Str::limit($artigo->conteudo, 120) }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</x-layouts::auth.simple>
