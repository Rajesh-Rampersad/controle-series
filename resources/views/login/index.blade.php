<x-layout title="Login">
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Login</h1>
    </x-slot>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                value="{{ old('email') }}">
            @error('email')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
            <input type="password" name="password" id="password" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('password')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember"
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-900">Remember me</label>
            </div>
            <div class="text-sm">
                <a href="" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Forgot your password?
                </a>
            </div>
        </div>
        <div>
            <button type="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-black bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Enviar
            </button>
        </div>
        <div class="text-sm text-center">
            <p>Don't have an account? <a href="" class="font-medium text-indigo-600 hover:text-indigo-500">Register</a></p>
        </div>
    </form>

</x-layout>
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const emailInput = document.getElementById('email');
        emailInput.focus();
    });
</script>
@endsection