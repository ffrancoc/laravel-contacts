@extends('layout')

@section('content')
    <div class="h-full flex justify-center items-center p-10">
        <div class="h-full container border shadow-md flex flex-col sm:flex-row bg-gray-50">
            @if (!empty($contact))
                <x-contact-form :contact="$contact" />
            @else
                <x-contact-form />
            @endif

            <x-contact-table :contacts="$contacts" />
        </div>
    </div>
@endsection

@section('custom-script')
    <script>                                        

        function showConfirm(contact) {         
            const dialog = document.getElementById(`dialog-${contact.id}`);
            const message = document.getElementById(`message-${contact.id}`);
            dialog.addEventListener('cancel', (e) => e.preventDefault());
            
            message.innerHTML = `El contacto <b>${contact.name}</b> será eliminado, desea continuar?`;
            dialog.showModal();
        }

        function hideConfirm(contact) {            
            const dialog = document.getElementById(`dialog-${contact.id}`);
            dialog.close();
        }

    </script>
@endsection
