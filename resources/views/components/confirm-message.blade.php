@props(['contact'])


<dialog id="dialog-{{$contact->id}}" class="backdrop:bg-slate-800 backdrop:bg-opacity-50 backdrop:backdrop-blur-sm">
    <div class="w-56 flex flex-col gap-2 p-2 bg-white">
        <div class="flex justify-end"><button onclick='hideConfirm({!! json_encode($contact) !!})'><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button></div>
            <p id="message-{{$contact->id}}"></p>
            <form action="{{ route('contacts.destroy', $contact->id ) }}" id="delete-form" method="post">
                @csrf
                @method('DELETE')                
                <button type="submit" class="p-2 bg-black text-white">Confirmar</button>
            </form>
    </div>
</dialog>
