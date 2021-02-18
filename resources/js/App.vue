<template>
    <div class="container-fluid">
        <router-view />
        <div class="app-version-wrapper">
            {{ appVersionComputed }}
        </div>
        <div class="screen-mode-wrapper">
            <template v-if="$isMobile()">
                Mode Mobile
            </template>
            <template v-else>
                Mode Desktop
            </template>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        appVersion: {
            type: String,
            required: true,
        },
        laravelVersion: {
            type: String,
            required: true,
        },
        phpVersion: {
            type: String,
            required: true,
        },
    },
    computed: {
        appVersionComputed() {
            return 'v' + this.appVersion
        },
        laravelVersionComputed() {
            return 'v' + this.laravelVersion
        },
        phpVersionComputed() {
            return 'v' + this.phpVersion
        },
    },
}
</script>