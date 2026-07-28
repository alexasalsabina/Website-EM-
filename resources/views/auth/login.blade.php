<x-guest-layout>
    <div class="w-full max-w-md">
        <div class="bg-white rounded-3xl shadow-xl p-8">
            <div class="text-center mb-8">
                <img
                    src="{{ asset('images/logo.png') }}"
                    class="w-20 h-20 mx-auto mb-4"
                    alt="Logo Desa">
                <h1 class="text-3xl font-bold text-[#284139]">
                    Admin Desa Jatisari
                </h1>
                <p class="text-gray-500 mt-2">
                    Silakan masuk untuk mengelola website Desa Jatisari.
                </p>
            </div>

            <x-auth-session-status
                class="mb-4"
                :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-5">
                    <x-input-label
                        for="email"
                        value="Email" />

                    <x-text-input
                        id="email"
                        class="block mt-2 w-full rounded-xl"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus />

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2"/>
                </div>

                <div class="mb-5">
                    <x-input-label
                        for="password"
                        value="Password"/>

                    <x-text-input
                        id="password"
                        class="block mt-2 w-full rounded-xl"
                        type="password"
                        name="password"
                        required />

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"/>
                </div>

                <div class="flex items-center justify-between mb-6">
                    <label class="inline-flex items-center">
                        <input
                            type="checkbox"
                            name="remember"
                            class="rounded">
                        <span class="ml-2 text-sm text-gray-600">
                            Ingat Saya
                        </span>
                    </label>

                    @if (Route::has('password.request'))
                        <a
                            href="{{ route('password.request') }}"
                            class="text-sm text-[#284139] hover:underline">
                            Lupa Password?
                        </a>
                    @endif
                </div>

                <x-primary-button
                    class="w-full justify-center py-3 rounded-xl bg-[#284139] hover:bg-[#809076]">
                    Masuk Dashboard
                </x-primary-button>
            </form>

            <div class="mt-8 text-center">
                <a
                    href="{{ route('home') }}"
                    class="text-sm text-gray-500 hover:text-[#284139]">
                    ← Kembali ke Website
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>