<template>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            <h1 class="mt-5 text-center">Bangsus Sistem</h1>
            <h5 class="mt-5">Selamat Datang di Bangsus Sistem</h5>
            <p class="text-muted">Login untuk melanjutkan</p>
            <StandardForm v-show="pageMeta.standardLogin" />
            <TokenForm v-show="!pageMeta.standardLogin" />
            <SwitchLoginModeLink
                :standard-mode-val="this.pageMeta.standardLogin"
                @toggleMode="toggleLoginMode"
            />
        </div>
    </div>
</template>

<script>
import StandardForm from './sections/StandardForm'
import TokenForm from './sections/TokenForm'
import SwitchLoginModeLink from './sections/SwitchLoginModeLink'

export default {
    components: {
        StandardForm,
        TokenForm,
        SwitchLoginModeLink,
    },
    data() {
        return {
            pageMeta: {
                standardLogin: true,
            }
        }
    },
    methods: {
        toggleLoginMode(val) {
            this.pageMeta.standardLogin = val
        }
    }
}
</script>