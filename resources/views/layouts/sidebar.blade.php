<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route('student.index')" :active="request()->routeIs('student.*')">
        Siswa
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route('rombel.index')" :active="request()->routeIs('rombel.*')">
        Lks
    </x-responsive-nav-link>
    <x-responsive-nav-link :href="route('modul.index')" :active="request()->routeIs('modul.*')">
        Modul
    </x-responsive-nav-link>
</div>