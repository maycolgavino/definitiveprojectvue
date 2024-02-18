<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>

<v-parallax src="https://images.unsplash.com/photo-1481151500463-1fa2dd2d5dbe?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8b2ZmaWNlJTIwZGFya3xlbnwwfHwwfHx8MA%3D%3D">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
        <div>
            <Link href="/">
                <ApplicationLogo class=" text-gray-700" />
            </Link>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-200 shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</v-parallax>

</template>
