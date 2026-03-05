<x-layouts::auth.simple>
    <div class="container mx-auto py-8">
        <a href="{{ route('artigos.index') }}" class="text-blue-500 hover:underline mb-4 inline-block">← Voltar para lista</a>
        <h1 class="text-2xl font-bold mb-4">{{ $artigo->titulo }}</h1>
        <div class="text-gray-500 text-sm mb-2">Publicado em {{ $artigo->created_at->format('d/m/Y') }}</div>
        <div class="prose max-w-none mb-8">
            {!! nl2br(e($artigo->conteudo)) !!}
        </div>

        @if($artigo->file_path)
            <div class="my-6">
                <iframe src="{{ asset('storage/' . $artigo->file_path) }}" width="100%" height="600px" class="border rounded shadow"></iframe>
            </div>
        @endif
    </div>
</x-layouts::auth.simple>
