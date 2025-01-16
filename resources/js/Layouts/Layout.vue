<script setup>
import { Link } from '@inertiajs/vue3';
import { route } from '../../../vendor/tightenco/ziggy/src/js';

</script>

<template>
    <div>
        <header>
            <nav>
                <div class="space-x-6">
                    <Link :href="route('home')" class="nav-link" :class="{'bg-slate-700' : $page.component === 'Home'}">Home</Link>
                    <!-- self closing tags yan kasi ewan ko may sira ata naka import naman -->
                </div>
                <div v-if="$page.props.auth.user" class="space-x-6 flex">
                    <img class="avatar" :src="$page.props.auth.user.avatar? ('storage/' + $page.props.auth.user.avatar) : ('storage/avatars/default.png')" alt="">
                    <Link :href="route('dashboard')" class="nav-link" :class="{'bg-slate-700' : $page.component === 'Dashboard'}" >Dashboard</Link>
                    <Link :href="route('logout')" method="post" as="button" class="nav-link">Logout</Link>
                </div>
                <div v-else class="space-x-6">
                    <Link :href="route('register')" class="nav-link" :class="{'bg-slate-700' : $page.component === 'Auth/Register'}">Register</Link>
                    <Link :href="route('login')" class="nav-link" :class="{'bg-slate-700' : $page.component === 'Auth/Login'}">Login</Link>
                    <!-- self closing tags yan kasi ewan ko may sira ata naka import naman -->
                </div>
            </nav>
        </header>

        <main class="p-4">
            <slot />
        </main>
    </div>
</template>
