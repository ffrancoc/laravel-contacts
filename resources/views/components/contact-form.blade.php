@props(['contact' => null])

<div class="p-10 bg-gray-100">
    <h1 class="text-xl font-semibold">{!! !empty($contact) ? 'Editar ' : 'Nuevo ' !!} <span class="font-normal">contacto</span></h1>
    <form class="mt-6" action="{!! !empty($contact) ? route('contacts.update', $contact) : route('contacts.store') !!}" method="POST">
        @csrf
        @isset($contact)
            @method('PUT')
        @endisset
        <label for="name" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Nombre</label>
        <input id="name" type="text" name="name" placeholder="jose" value="{!! !empty($contact) ? $contact->name : old('name', '') !!}"
            class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" />

        <label for="email" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Correo</label>
        <input id="email" type="email" name="email" placeholder="john.doe@company.com"
            value="{!! !empty($contact) ? $contact->email : old('email', '') !!}" autocomplete="email"
            class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" />
        @if ($errors->has('email'))
            <small class="text-red-500">{{ $errors->first('email') }}</small>
        @endif

        <label for="phone" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Telefono</label>
        <input id="phone" type="tel" name="phone" placeholder="0000-0000" value="{!! !empty($contact) ? $contact->phone : old('phone', '') !!}"
            class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" />
        @if ($errors->has('phone'))
            <small class="text-red-500">{{ $errors->first('phone') }}</small>
        @endif


        <div class="flex flex-col gap-3 mt-6">
            <button type="reset"
                class="w-full py-2  font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                Limpiar
            </button>

            @isset($contact)
                <a href="{{ route('contacts.index') }}"
                    class="w-full py-2 text-center font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                    Cancelar
                </a>
            @endisset


            <button type="submit"
                class="w-full py-2 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                {!! !empty($contact) ? 'Actualizar' : 'Guardar' !!}
            </button>
        </div>
    </form>
</div>
