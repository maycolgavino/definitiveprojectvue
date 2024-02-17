    <script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';

    </script>

    <template>
        <Head title="Dashboard" />

        <AuthenticatedLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-blue-800 dark:text-gray-200 leading-tight">Tablero</h2>
            </template>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-900">Estas Logeado!</div>
                        <div>
                            <v-container>
                                <v-row align="center" justify="center">
                                    <v-col cols="auto">
                                        <v-btn size="x-small">Extra small Button</v-btn>
                                    </v-col>

                                    <v-col cols="auto">
                                        <v-btn size="small">Small Button</v-btn>
                                    </v-col>

                                    <v-col cols="auto">
                                        <v-btn>Regular Button</v-btn>
                                    </v-col>

                                    <v-col cols="auto">
                                        <v-btn size="large">Large Button</v-btn>
                                    </v-col>

                                    <v-col cols="auto">
                                        <v-btn size="x-large">X-Large Button</v-btn>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </div>
                        <div>
                            <v-checkbox label="Mi checkbox"></v-checkbox>
                            <input type="checkbox" id="checkbox" />
                            <label for="checkbox">Polalalal</label>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    </template>
