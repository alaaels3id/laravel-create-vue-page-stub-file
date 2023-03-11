<script setup>
defineProps(['name'])
</script>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" v-text="name"></div>

                    <div class="card-body">
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
