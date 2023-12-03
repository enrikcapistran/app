<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach ($kits as $kit)
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                    <img class="w-full h-48" src="{{ Storage::url($kit->imagen) }}" alt="Imagen" />
                    <div class="px-6 py-4">

                        <a href="{{ route('kits.show', $kit->id) }}">
                            <h4
                                class="mb-3 text-xl font-semibold tracking-tight text-green-600 hover:text-green-400 uppercase">
                                {{ $kit->nombre }}</h4>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</x-guest-layout>