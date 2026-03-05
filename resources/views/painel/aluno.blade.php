<x-layouts::app :title="__('Painel do Aluno')">
    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-4">Olá, {{ $user->name }}</h2>
        <form method="POST" action="{{ route('painel.aluno.store') }}" class="mb-8 flex flex-col gap-4">
            @csrf
            <flux:input name="titulo" label="Título do Artigo" required />
            <flux:input name="conteudo" label="Conteúdo" type="textarea" required />
            <div>
                <flux:button type="submit" variant="primary">Postar Artigo</flux:button>
            </div>
        </form>
        <h3 class="text-xl font-semibold mb-2">Seus Artigos</h3>
        <ul class="space-y-2">
            @forelse($artigos as $artigo)
                <li class="border rounded p-3 bg-white dark:bg-zinc-900">
                    <div class="font-bold">{{ $artigo->titulo }}</div>
                    <div class="text-sm text-zinc-600 dark:text-zinc-400">Status: {{ $artigo->status }}</div>
                    <div class="mt-1">{{ Str::limit($artigo->conteudo, 120) }}</div>
                </li>
            @empty
                <li>Nenhum artigo cadastrado.</li>
            @endforelse
        </ul>
    </div>
</x-layouts::app>
