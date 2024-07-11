<div x-data="{ showConfirmModal: false }">
    <button @click="showConfirmModal = true" class="hover:bg-slate-200 rounded-3xl p-2 transition-all">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5 h-5"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z"/></svg>
    </button>

    <div x-show="showConfirmModal" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="fixed inset-0 bg-gray-800 opacity-50"></div>
        <div class="bg-white rounded-lg shadow-lg max-w-lg mx-auto p-6 relative z-10">
            <button @click="showConfirmModal = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                &times;
            </button>

            <h2 class="text-xl font-semibold mb-4">Eliminar publicación</h2>
            <p class="mb-4">¿Estas seguro de que quieres hacerlo?</p>
            <div class="flex justify-end">
                <button @click="showConfirmModal = false" class="hover:bg-gray-400 px-4 py-2 bg-gray-500 text-white rounded-md mr-2">Cancelar</button>      
                    <form method="POST" action="{{ route('posts.destroy', $post )}}">
                        @method('DELETE')
                        @csrf
                        <input 
                            type="submit" value="Eliminar" @click="confirmAction" class="cursor-pointer hover:bg-red-400 px-4 py-2 bg-red-500 text-white rounded-md">
                    </form>
            </div>
        </div>
    </div>
</div>